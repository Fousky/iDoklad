<?php

namespace Fousky\Component\iDoklad\UrlExtension;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class iDokladSortable implements UrlExtensionInterface
{
    const ASCENDING = 'asc'; // 123

    const DESCENDING = 'desc'; // 321

    protected $parts = [];

    /**
     * @param string $property
     * @param string $order
     *
     * @throws \InvalidArgumentException
     *
     * @return iDokladSortable
     */
    public function sort(string $property, string $order): self
    {
        if (!$this->isValidOrder($order)) {
            throw new \InvalidArgumentException(sprintf(
                'Sort order %s is not valid. Available orders: %s',
                $order,
                implode(', ', [self::ASCENDING, self::DESCENDING])
            ));
        }

        $this->parts[] = sprintf(
            '%s~%s',
            $property,
            $order
        );

        return $this;
    }

    /**
     * Return key => value associative array of HTTP GET parameters.
     *
     * @return array
     *
     * @internal
     */
    public function getHttpQuery(): array
    {
        if (0 === count($this->parts)) {
            return [];
        }

        return [
            'sort' => implode('|', $this->parts),
        ];
    }

    /**
     * @param string $order
     *
     * @return bool
     */
    protected function isValidOrder(string $order): bool
    {
        return self::ASCENDING === $order || self::DESCENDING === $order;
    }
}

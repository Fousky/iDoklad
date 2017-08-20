<?php

namespace Fousky\Component\iDoklad\UrlExtension;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class iDokladFilter implements UrlExtensionInterface
{
    const LESS_THEN = 'lt';
    const LESS_THEN_OR_EQUAL = 'lte';
    const GREATER_THEN = 'gt';
    const GREATER_THEN_OR_EQUAL = 'gte';
    const EQUAL = 'eq';
    const NOT_EQUAL = '!eq';
    const CONTAINS = 'ct';
    const NOT_CONTAINS = '!ct';
    const BETWEEN = 'between';

    const FILTER_TYPE_AND = 'and';
    const FILTER_TYPE_OR = 'or';

    public static $operators = [
        self::LESS_THEN,
        self::LESS_THEN_OR_EQUAL,
        self::GREATER_THEN,
        self::GREATER_THEN_OR_EQUAL,
        self::EQUAL,
        self::NOT_EQUAL,
        self::CONTAINS,
        self::NOT_CONTAINS,
        self::BETWEEN,
    ];

    protected $parts = [];
    protected $type = self::FILTER_TYPE_AND;

    /**
     * @param string $property
     * @param string $operator
     * @param string $value
     *
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function filter(string $property, string $operator, string $value): iDokladFilter
    {
        if (!$this->isValidOperator($operator)) {
            throw new \InvalidArgumentException(sprintf(
                'Operator %s is not valid. Available operators: %s',
                $operator,
                implode(', ', static::$operators)
            ));
        }

        $this->parts[] = sprintf(
            '%s~%s~%s',
            $property,
            $operator,
            $value
        );

        return $this;
    }

    /**
     * @param string $type
     *
     * @return iDokladFilter
     * @throws \InvalidArgumentException
     */
    public function filterType(string $type): iDokladFilter
    {
        if ($type !== self::FILTER_TYPE_AND && $type !== self::FILTER_TYPE_OR) {
            throw new \InvalidArgumentException(sprintf(
                'Type %s is not valid. Available types: %s',
                $type,
                implode(', ', [self::FILTER_TYPE_AND, self::FILTER_TYPE_OR])
            ));
        }

        $this->type = $type;

        return $this;
    }

    /**
     * Return key => value associative array of HTTP GET parameters.
     *
     * @return array
     * @internal
     */
    public function getHttpQuery(): array
    {
        if (count($this->parts) === 0) {
            return [];
        }

        $result = [];

        return [
            'filter' => implode('|', $result),
            'filtertype' => $this->type,
        ];
    }

    /**
     * @param string $operator
     *
     * @return bool
     */
    protected function isValidOperator(string $operator): bool
    {
        return defined(sprintf('self::%s', $operator));
    }
}

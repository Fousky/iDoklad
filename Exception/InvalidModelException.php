<?php

namespace Fousky\Component\iDoklad\Exception;

use Throwable;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class InvalidModelException extends \Exception implements iDokladExceptionInterface
{
    /**
     * InvalidModelException constructor.
     *
     * @param array          $errors
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct(array $errors, $code = 0, Throwable $previous = null)
    {
        parent::__construct($this->createMessage($errors), $code, $previous);
    }

    /**
     * @param array $errors
     *
     * @return string
     */
    protected function createMessage(array $errors): string
    {
        return implode("\n", $errors);
    }
}

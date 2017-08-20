<?php

namespace Fousky\Component\iDoklad\Model;

use Psr\Http\Message\ResponseInterface;
use Fousky\Component\iDoklad\Exception\InvalidResponseException;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
interface iDokladModelInterface
{
    /**
     * Create JSON for REQUEST.
     *
     * @param array $options
     *
     * @return array
     */
    public function toArray(array $options = []): array;

    /**
     * Create model class from Response or throw exception.
     *
     * @param ResponseInterface $response
     *
     * @return iDokladModelInterface
     *
     * @throws InvalidResponseException
     */
    public static function createFromResponse(ResponseInterface $response): iDokladModelInterface;
}

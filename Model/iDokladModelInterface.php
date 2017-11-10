<?php

namespace Fousky\Component\iDoklad\Model;

use Fousky\Component\iDoklad\Exception\InvalidResponseException;
use Psr\Http\Message\ResponseInterface;

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
     * @throws InvalidResponseException
     *
     * @return iDokladModelInterface
     */
    public static function createFromResponse(ResponseInterface $response): self;
}

<?php

namespace Fousky\Component\iDoklad\Exception;

use Psr\Http\Message\ResponseInterface;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class InvalidTokenException extends \Exception implements iDokladExceptionInterface
{
    /**
     * @param ResponseInterface $response
     * @param string            $uniqueCode
     * @param int               $code
     * @param \Throwable|null   $previous
     */
    public function __construct(
        ResponseInterface $response,
        string $uniqueCode,
        int $code = 0,
        \Throwable $previous = null
    ) {
        try {
            $message = sprintf(
                '%s: [status_code]: %s, [body]: %s',
                $uniqueCode,
                $response->getStatusCode(),
                $response->getBody()->getContents()
            );
        } catch (\Exception $previous) {
            $message = $uniqueCode;
        }

        parent::__construct($message, $code, $previous);
    }
}

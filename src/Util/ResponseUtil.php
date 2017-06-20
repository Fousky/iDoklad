<?php

namespace Fousky\Component\iDoklad\Util;

use Psr\Http\Message\ResponseInterface;

/**
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
class ResponseUtil
{
    /**
     * @param ResponseInterface $response
     *
     * @return \stdClass|array
     * @throws \RuntimeException
     */
    public static function handle(ResponseInterface $response)
    {
        return \GuzzleHttp\json_decode(
            $response
                ->getBody()
                ->getContents()
        );
    }
}

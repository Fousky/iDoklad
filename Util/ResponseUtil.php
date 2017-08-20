<?php

namespace Fousky\Component\iDoklad\Util;

use Psr\Http\Message\ResponseInterface;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ResponseUtil
{
    /**
     * @param ResponseInterface $response
     *
     * @throws \RuntimeException
     *
     * @return \stdClass|array
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

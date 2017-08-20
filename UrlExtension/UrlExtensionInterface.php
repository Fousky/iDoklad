<?php

namespace Fousky\Component\iDoklad\UrlExtension;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
interface UrlExtensionInterface
{
    /**
     * Return key => value associative array of HTTP GET parameters.
     *
     * @return array
     */
    public function getHttpQuery(): array;
}

<?php

namespace Fousky\Component\iDoklad\UrlExtension;

/**
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
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

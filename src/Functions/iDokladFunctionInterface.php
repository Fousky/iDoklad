<?php

namespace Fousky\Component\iDoklad\Functions;

use Psr\Http\Message\ResponseInterface;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;

/**
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
interface iDokladFunctionInterface
{
    /**
     * Get iDokladModelInterface class.
     *
     * @see iDokladModelInterface
     *
     * @return string
     */
    public function getModelClass(): string;

    /**
     * Should API caller inject authorization AccessToken to HTTP headers?
     *
     * @return bool
     */
    public function injectAccessTokenToHeaders(): bool;

    /**
     * Configuration is injected before getters are called.
     *
     * @see iDokladApiClient::call()
     *
     * @param array $config
     * @return iDokladFunctionInterface
     */
    public function setConfig(array $config): iDokladFunctionInterface;

    /**
     * GET|POST|PUT|DELETE e.g.
     *
     * @see iDokladApiCaller::request()
     *
     * @return string
     */
    public function getHttpMethod(): string;

    /**
     * Return base URI, e.g. /invoices; /invoice/1/edit and so on.
     *
     * @see iDokladApiClient::call()
     *
     * @return string
     */
    public function getUri(): string;

    /**
     * Vrátí seznam parametrů, které se předají GuzzleHttp\Client
     *
     * @see \GuzzleHttp\Client::request()
     * @see iDokladApiClient::call()
     *
     * @return array
     */
    public function getGuzzleOptions(): array;

    /**
     * Handle response from iDoklad and create model instance.
     *
     * @param ResponseInterface $response
     *
     * @return iDokladModelInterface
     */
    public function handleResponse(ResponseInterface $response): iDokladModelInterface;
}

<?php

namespace Fousky\Component\iDoklad\Functions;

use Fousky\Component\iDoklad\iDoklad;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
use Fousky\Component\iDoklad\UrlExtension\iDokladFilter;
use Fousky\Component\iDoklad\UrlExtension\iDokladPaginator;
use Fousky\Component\iDoklad\UrlExtension\iDokladSortable;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
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
     * @see iDoklad::call()
     *
     * @param array $config
     *
     * @return iDokladFunctionInterface
     */
    public function setConfig(array $config): self;

    /**
     * GET|POST|PUT|DELETE e.g.
     *
     * @see iDoklad::request()
     *
     * @return string
     */
    public function getHttpMethod(): string;

    /**
     * Return base URI, e.g. /invoices; /invoice/1/edit and so on.
     *
     * @see iDoklad::call()
     *
     * @return string
     */
    public function getUri(): string;

    /**
     * Vrátí seznam parametrů, které se předají GuzzleHttp\Client.
     *
     * @see \GuzzleHttp\Client::request()
     * @see iDoklad::call()
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

    /**
     * @return bool
     */
    public function hasSortable(): bool;

    /**
     * @return iDokladSortable
     */
    public function getSortable(): iDokladSortable;

    /**
     * @param null|iDokladSortable $sortable
     */
    public function setSortable(iDokladSortable $sortable = null);

    /**
     * @return bool
     */
    public function hasPaginator(): bool;

    /**
     * @return iDokladPaginator
     */
    public function getPaginator(): iDokladPaginator;

    /**
     * @param null|iDokladPaginator $paginator
     */
    public function setPaginator(iDokladPaginator $paginator = null);

    /**
     * @return bool
     */
    public function hasFilter(): bool;

    /**
     * @return iDokladFilter
     */
    public function getFilter(): iDokladFilter;

    /**
     * @param null|iDokladFilter $filter
     */
    public function setFilter(iDokladFilter $filter = null);
}

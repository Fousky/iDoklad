<?php

namespace Fousky\Component\iDoklad\Functions\RegisteredSale;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\RegisteredSale\RegisteredSaleApiModelPost;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=GET-api-v2-RegisteredSales-Default
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetRegisteredSaleDefault extends iDokladAbstractFunction
{
    /**
     * Get iDokladModelInterface class.
     *
     * @see iDokladModelInterface
     *
     * @return string
     */
    public function getModelClass(): string
    {
        return RegisteredSaleApiModelPost::class;
    }

    /**
     * GET|POST|PUT|DELETE e.g.
     *
     * @see iDoklad::request()
     *
     * @return string
     */
    public function getHttpMethod(): string
    {
        return 'GET';
    }

    /**
     * Return base URI, e.g. /invoices; /invoice/1/edit and so on.
     *
     * @see iDoklad::call()
     *
     * @return string
     */
    public function getUri(): string
    {
        return 'RegisteredSales/Default';
    }

    /**
     * Vrátí seznam parametrů, které se předají GuzzleHttp\Client.
     *
     * @see \GuzzleHttp\Client::request()
     * @see iDoklad::call()
     *
     * @return array
     */
    public function getGuzzleOptions(): array
    {
        return [];
    }
}

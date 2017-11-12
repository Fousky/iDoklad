<?php

namespace Fousky\Component\iDoklad\Functions\RegisteredSale;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\LOV\SalesTypeEnum;
use Fousky\Component\iDoklad\Model\RegisteredSale\RegisteredSaleApiModel;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=GET-api-v2-RegisteredSales-type-id
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetRegisteredSaleByType extends iDokladAbstractFunction
{
    /** @var int $type */
    protected $type;

    /** @var string $id */
    protected $id;

    /**
     * @param SalesTypeEnum $type
     * @param string        $id
     */
    public function __construct(SalesTypeEnum $type, string $id)
    {
        $this->type = $type->getValue();
        $this->id = $id;
    }

    /**
     * Get iDokladModelInterface class.
     *
     * @see iDokladModelInterface
     *
     * @return string
     */
    public function getModelClass(): string
    {
        return RegisteredSaleApiModel::class;
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
        return sprintf(
            'RegisteredSales/%s/%s',
            $this->type,
            $this->id
        );
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

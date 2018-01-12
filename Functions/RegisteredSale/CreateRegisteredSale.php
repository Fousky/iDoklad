<?php

namespace Fousky\Component\iDoklad\Functions\RegisteredSale;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\LOV\SalesTypeEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\RegisteredSale\RegisteredSaleApiModel;
use Fousky\Component\iDoklad\Model\RegisteredSale\RegisteredSaleApiModelPost;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=POST-api-v2-RegisteredSales-type-id
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CreateRegisteredSale extends iDokladAbstractFunction
{
    /** @var int $type */
    protected $type;

    /** @var string $id */
    protected $id;

    /** @var RegisteredSaleApiModelPost $data */
    protected $data;

    /**
     * @param SalesTypeEnum              $type SALES TYPE
     * @param string                     $id   ID of sales type
     * @param RegisteredSaleApiModelPost $data
     *
     * @throws \Fousky\Component\iDoklad\Exception\InvalidModelException
     */
    public function __construct(SalesTypeEnum $type, string $id, RegisteredSaleApiModelPost $data)
    {
        $this->type = $type->getValue();
        $this->id = $id;
        $this->data = $data;

        $this->validate($data);
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
        return 'POST';
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
     *
     * @throws \ReflectionException
     * @throws \InvalidArgumentException
     */
    public function getGuzzleOptions(): array
    {
        return [
            'json' => $this->data->toArray([
                iDokladAbstractModel::TOARRAY_REMOVE_NULLS => true,
            ]),
        ];
    }
}

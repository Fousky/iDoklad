<?php

namespace Fousky\Component\iDoklad\Functions\IssuedInvoices;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\IssuedInvoices\IssuedInvoiceApiModel;
use Fousky\Component\iDoklad\Model\IssuedInvoices\IssuedInvoiceApiModelInsertV2;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=POST-api-v2-IssuedInvoices
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CreateIssuedInvoice extends iDokladAbstractFunction
{
    /** @var IssuedInvoiceApiModelInsertV2 $data */
    protected $data;

    /**
     * @param IssuedInvoiceApiModelInsertV2 $data
     *
     * @throws \Fousky\Component\iDoklad\Exception\InvalidModelException
     */
    public function __construct(IssuedInvoiceApiModelInsertV2 $data)
    {
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
        return IssuedInvoiceApiModel::class;
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
        return 'IssuedInvoices';
    }

    /**
     * Vrátí seznam parametrů, které se předají GuzzleHttp\Client.
     *
     * @see \GuzzleHttp\Client::request()
     * @see iDoklad::call()
     *
     * @return array
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

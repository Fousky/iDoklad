<?php

namespace Fousky\Component\iDoklad\Functions\IssuedInvoices;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\IssuedInvoices\IssuedInvoiceApiModel;
use Fousky\Component\iDoklad\Model\IssuedInvoices\IssuedInvoicePatchModel;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=PATCH-api-v2-IssuedInvoices-id
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class UpdateIssuedInvoice extends iDokladAbstractFunction
{
    /** @var string $id */
    protected $id;

    /** @var IssuedInvoicePatchModel $data */
    protected $data;

    /**
     * @param string                  $id
     * @param IssuedInvoicePatchModel $data
     *
     * @throws \Fousky\Component\iDoklad\Exception\InvalidModelException
     */
    public function __construct(string $id, IssuedInvoicePatchModel $data)
    {
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
        return 'PATCH';
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
        return sprintf('IssuedInvoices/%s', $this->id);
    }

    /**
     * Vrátí seznam parametrů, které se předají GuzzleHttp\Client.
     *
     * @see \GuzzleHttp\Client::request()
     * @see iDoklad::call()
     *
     * @throws \ReflectionException
     * @throws \InvalidArgumentException
     *
     * @return array
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

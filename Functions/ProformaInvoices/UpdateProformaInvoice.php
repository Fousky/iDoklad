<?php

namespace Fousky\Component\iDoklad\Functions\ProformaInvoices;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\ProformaInvoices\ProformaInvoiceApiModel;
use Fousky\Component\iDoklad\Model\ProformaInvoices\ProformaInvoicePutModelV2;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=PUT-api-v2-ProformaInvoices-id
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class UpdateProformaInvoice extends iDokladAbstractFunction
{
    /** @var string $id */
    protected $id;

    /** @var ProformaInvoicePutModelV2 $data */
    protected $data;

    /**
     * @param string $id
     * @param ProformaInvoicePutModelV2 $data
     */
    public function __construct(string $id, ProformaInvoicePutModelV2 $data)
    {
        $this->id = $id;
        $this->data = $data;
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
        return ProformaInvoiceApiModel::class;
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
        return 'PUT';
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
        return sprintf('ProformaInvoices/%s', $this->id);
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

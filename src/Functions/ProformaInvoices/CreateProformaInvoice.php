<?php

namespace Fousky\Component\iDoklad\Functions\ProformaInvoices;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\ProformaInvoices\ProformaInvoiceApiModel;
use Fousky\Component\iDoklad\Model\ProformaInvoices\ProformaInvoiceModel;

/**
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
class CreateProformaInvoice extends iDokladAbstractFunction
{
    /** @var ProformaInvoiceModel $data */
    protected $data;

    /**
     * @param ProformaInvoiceModel $data
     */
    public function __construct(ProformaInvoiceModel $data)
    {
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
        return 'ProformaInvoices';
    }

    /**
     * Vrátí seznam parametrů, které se předají GuzzleHttp\Client
     *
     * @see \GuzzleHttp\Client::request()
     * @see iDoklad::call()
     *
     * @return array
     * @throws \Exception
     */
    public function getGuzzleOptions(): array
    {
        return [
            'json' => $this->data->toArray(),
        ];
    }
}

<?php

namespace Fousky\Component\iDoklad\Functions\IssuedInvoices;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\Documents\DocumentAddressApiModel;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=PUT-api-v2-IssuedInvoices-id-MyDocumentAddress
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class UpdateIssuedInvoiceMyDocumentAddress extends iDokladAbstractFunction
{
    /** @var string $id */
    protected $id;

    /** @var DocumentAddressApiModel $data */
    protected $data;

    /**
     * @param string $id
     * @param DocumentAddressApiModel $data
     *
     * @throws \Fousky\Component\iDoklad\Exception\InvalidModelException
     */
    public function __construct(string $id, DocumentAddressApiModel $data)
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
        return DocumentAddressApiModel::class;
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
        return sprintf('IssuedInvoices/%s/MyDocumentAddress', $this->id);
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

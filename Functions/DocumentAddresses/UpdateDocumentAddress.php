<?php

namespace Fousky\Component\iDoklad\Functions\DocumentAddresses;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\DocumentAddresses\DocumentAddressPutModelV2;
use Fousky\Component\iDoklad\Model\Documents\DocumentAddressApiModel;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=PUT-api-v2-DocumentAddresses-id
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class UpdateDocumentAddress extends iDokladAbstractFunction
{
    /** @var string $id */
    protected $id;

    /** @var DocumentAddressPutModelV2 $data */
    protected $data;

    /**
     * @param string                    $id
     * @param DocumentAddressPutModelV2 $data
     */
    public function __construct(string $id, DocumentAddressPutModelV2 $data)
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
        return sprintf('DocumentAddresses/%s', $this->id);
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

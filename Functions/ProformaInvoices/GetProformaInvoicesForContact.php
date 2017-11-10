<?php

namespace Fousky\Component\iDoklad\Functions\ProformaInvoices;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\ProformaInvoices\ProformaInvoiceApiCollectionModel;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=GET-api-v2-ProformaInvoices-contactId-Invoices
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetProformaInvoicesForContact extends iDokladAbstractFunction
{
    /** @var string $contactId */
    protected $contactId;

    /**
     * @param string $contactId
     */
    public function __construct(string $contactId)
    {
        $this->contactId = $contactId;
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
        return ProformaInvoiceApiCollectionModel::class;
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
        return sprintf('ProformaInvoices/%s/Invoices', $this->contactId);
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

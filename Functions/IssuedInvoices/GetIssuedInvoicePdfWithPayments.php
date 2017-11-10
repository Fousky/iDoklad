<?php

namespace Fousky\Component\iDoklad\Functions\IssuedInvoices;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\Other\PdfBase64Model;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=GET-api-v2-IssuedInvoices-id-GetPdfWithPayments_onlyEetPayments
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetIssuedInvoicePdfWithPayments extends iDokladAbstractFunction
{
    /** @var string $id */
    protected $id;

    /** @var bool $onlyEetPayments */
    protected $onlyEetPayments;

    /**
     * @param string $id
     * @param bool   $onlyEetPayments
     */
    public function __construct(string $id, bool $onlyEetPayments = false)
    {
        $this->id = $id;
        $this->onlyEetPayments = $onlyEetPayments;
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
        return PdfBase64Model::class;
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
            'IssuedInvoices/%s/GetPdfWithPayments?onlyEetPayments=%s',
            $this->id,
            true === $this->onlyEetPayments ? 1 : 0
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

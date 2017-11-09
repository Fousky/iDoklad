<?php

namespace Fousky\Component\iDoklad\Functions\IssuedDocumentPayments;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\IssuedDocumentPayments\IssuedDocumentPaymentApiModelInsert;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetDefaultIssuedDocumentPayment extends iDokladAbstractFunction
{
    /** @var string $documentId */
    protected $documentId;

    /**
     * @param string $documentId
     */
    public function __construct(string $documentId)
    {
        $this->documentId = $documentId;
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
        return IssuedDocumentPaymentApiModelInsert::class;
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
        return sprintf('IssuedDocumentPayments/Default/%s', $this->documentId);
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

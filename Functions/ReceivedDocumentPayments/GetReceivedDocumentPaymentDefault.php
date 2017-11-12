<?php

namespace Fousky\Component\iDoklad\Functions\ReceivedDocumentPayments;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\ReceivedDocumentPayments\ReceivedDocumentPaymentApiModelInsert;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=GET-api-v2-ReceivedDocumentPayments-Default-documentId
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetReceivedDocumentPaymentDefault extends iDokladAbstractFunction
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
        return ReceivedDocumentPaymentApiModelInsert::class;
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
        return sprintf('ReceivedDocumentPayments/Default/%s', $this->documentId);
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

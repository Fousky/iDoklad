<?php

namespace Fousky\Component\iDoklad\Functions\ReceivedDocumentPayments;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\ReceivedDocumentPayments\ReceivedDocumentPaymentApiModelExpand;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=GET-api-v2-ReceivedDocumentPayments-id-Expand
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetReceivedDocumentPaymentExpand extends iDokladAbstractFunction
{
    /** @var string $id */
    protected $id;

    /**
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
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
        return ReceivedDocumentPaymentApiModelExpand::class;
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
        return sprintf('ReceivedDocumentPayments/%s/Expand', $this->id);
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

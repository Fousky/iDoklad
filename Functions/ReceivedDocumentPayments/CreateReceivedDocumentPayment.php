<?php

namespace Fousky\Component\iDoklad\Functions\ReceivedDocumentPayments;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\ReceivedDocumentPayments\ReceivedDocumentPaymentApiModel;
use Fousky\Component\iDoklad\Model\ReceivedDocumentPayments\ReceivedDocumentPaymentApiModelInsert;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=POST-api-v2-ReceivedDocumentPayments
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CreateReceivedDocumentPayment extends iDokladAbstractFunction
{
    /** @var ReceivedDocumentPaymentApiModelInsert $data */
    protected $data;

    /**
     * @param ReceivedDocumentPaymentApiModelInsert $data
     *
     * @throws \Fousky\Component\iDoklad\Exception\InvalidModelException
     */
    public function __construct(ReceivedDocumentPaymentApiModelInsert $data)
    {
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
        return ReceivedDocumentPaymentApiModel::class;
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
        return 'ReceivedDocumentPayments';
    }

    /**
     * Vrátí seznam parametrů, které se předají GuzzleHttp\Client.
     *
     * @see \GuzzleHttp\Client::request()
     * @see iDoklad::call()
     *
     * @return array
     *
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

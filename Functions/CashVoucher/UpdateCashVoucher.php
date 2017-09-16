<?php

namespace Fousky\Component\iDoklad\Functions\CashVoucher;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\CashVoucher\CashVoucherApiModel;
use Fousky\Component\iDoklad\Model\CashVoucher\CashVoucherApiModelUpdate;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=PUT-api-v2-CashVouchers-id
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class UpdateCashVoucher extends iDokladAbstractFunction
{
    /** @var string $id */
    protected $id;

    /** @var CashVoucherApiModelUpdate $data */
    protected $data;

    /**
     * @param string $voucherId
     * @param CashVoucherApiModelUpdate $data
     *
     * @throws \Fousky\Component\iDoklad\Exception\InvalidModelException
     */
    public function __construct(string $voucherId, CashVoucherApiModelUpdate $data)
    {
        $this->id = $voucherId;
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
        return CashVoucherApiModel::class;
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
        return sprintf('CashVouchers/%s', $this->id);
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
            'json' => $this->data->toArray(),
        ];
    }
}

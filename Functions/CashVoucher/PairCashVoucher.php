<?php

namespace Fousky\Component\iDoklad\Functions\CashVoucher;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\LOV\InvoiceTypeEnum;
use Fousky\Component\iDoklad\Model\CashVoucher\CashVoucherApiModelInsert;
use Fousky\Component\iDoklad\Model\Void\VoidModel;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=POST-api-v2-CashVouchers-Pair-invoiceType-invoiceId
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class PairCashVoucher extends iDokladAbstractFunction
{
    /** @var CashVoucherApiModelInsert $data */
    protected $data;

    /** @var InvoiceTypeEnum $invoiceType */
    protected $invoiceType;

    /** @var string $invoiceId */
    protected $invoiceId;

    /**
     * @param CashVoucherApiModelInsert $data Cash voucher identification (or create new)
     * @param int $invoiceType Pair with invoice type (object InvoiceTypeEnum constant)
     * @param string $invoiceId Pair with invoice ID of the $invoiceType
     */
    public function __construct(CashVoucherApiModelInsert $data, int $invoiceType, string $invoiceId)
    {
        $this->data = $data;
        $this->invoiceType = new InvoiceTypeEnum($invoiceType);
        $this->invoiceId = $invoiceId;
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
        return VoidModel::class;
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
        return sprintf(
            'CashVouchers/Pair/%s/%s',
            (string) $this->invoiceType,
            (string) $this->invoiceId
        );
    }

    /**
     * Vrátí seznam parametrů, které se předají GuzzleHttp\Client
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
            'json' => $this->data->toArray(),
        ];
    }
}

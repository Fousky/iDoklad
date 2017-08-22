<?php

namespace Fousky\Component\iDoklad\Functions\CashVoucher;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\LOV\InvoiceTypeEnum;
use Fousky\Component\iDoklad\Model\Void\VoidModel;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=POST-api-v2-CashVouchers-Pair-cashVoucherId-invoiceType-invoiceId
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class PairCashVoucherByInvoice extends iDokladAbstractFunction
{
    /** @var int $cashVoucherId */
    protected $cashVoucherId;

    /** @var InvoiceTypeEnum $invoiceType */
    protected $invoiceType;

    /** @var int $invoiceId */
    protected $invoiceId;

    /**
     * @param int $cashVoucherId
     * @param int $invoiceType
     * @param int $invoiceId
     */
    public function __construct(int $cashVoucherId, int $invoiceType, int $invoiceId)
    {
        $this->cashVoucherId = $cashVoucherId;
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
            'CashVouchers/Pair/%s/%s/%s',
            $this->cashVoucherId,
            $this->invoiceType->getValue(),
            $this->invoiceId
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

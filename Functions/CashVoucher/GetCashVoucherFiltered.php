<?php

namespace Fousky\Component\iDoklad\Functions\CashVoucher;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\LOV\InvoiceTypeEnum;
use Fousky\Component\iDoklad\LOV\MovementTypeEnum;
use Fousky\Component\iDoklad\Model\CashVoucher\CashVoucherApiModelInsert;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=GET-api-v2-CashVouchers-Default-movementType-invoiceType-invoiceId
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetCashVoucherFiltered extends iDokladAbstractFunction
{
    /** @var MovementTypeEnum $movementType */
    protected $movementType;

    /** @var InvoiceTypeEnum $invoiceType */
    protected $invoiceType;

    /** @var string $invoiceId */
    protected $invoiceId;

    /**
     * @param string $invoiceId
     * @param int    $movementType Constant from: MovementTypeEnum
     * @param int    $invoiceType  Constant from: InvoiceTypeEnum
     */
    public function __construct(
        string $invoiceId,
        int $movementType = MovementTypeEnum::ENTRY,
        int $invoiceType = InvoiceTypeEnum::NONE
    ) {
        $this->movementType = new MovementTypeEnum($movementType);
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
        return CashVoucherApiModelInsert::class;
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
            'CashVouchers/Default/%s/%s/%s',
            (string) $this->movementType,
            (string) $this->invoiceType,
            (string) $this->invoiceId
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

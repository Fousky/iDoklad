<?php

namespace Fousky\Component\iDoklad\Functions\CashVoucher;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\LOV\MovementTypeEnum;
use Fousky\Component\iDoklad\Model\CashVoucher\CashVoucherApiModelInsert;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetDefaultCashVoucher extends iDokladAbstractFunction
{
    /** @var MovementTypeEnum $movementType */
    protected $movementType;

    /**
     * GetDefaultCashVoucher constructor.
     *
     * @param MovementTypeEnum $movementType
     */
    public function __construct(MovementTypeEnum $movementType)
    {
        $this->movementType = $movementType;
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
        return sprintf('CashVouchers/Default/%s', $this->movementType->getValue());
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

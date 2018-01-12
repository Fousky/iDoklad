<?php

namespace Fousky\Component\iDoklad\Model\CashVoucher;

use Fousky\Component\iDoklad\LOV\PriceTypeWithoutOnlyBaseEnum;
use Fousky\Component\iDoklad\LOV\VatRateTypeEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|float getAmount()
 * @method null|int getId()
 * @method null|string getName()
 * @method null|float getPrice()
 * @method null|PriceTypeWithoutOnlyBaseEnum getPriceType()
 * @method null|bool getStatus()
 * @method null|string getVariableSymbol()
 * @method null|float getVatRate()
 * @method null|VatRateTypeEnum getVatRateType()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CashVoucherItemApiModel extends iDokladAbstractModel
{
    public $Amount;

    public $Id;

    public $Name;

    public $Price;

    public $PriceType;

    public $Status;

    public $VariableSymbol;

    public $VatRate;

    public $VatRateType;

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'PriceType' => PriceTypeWithoutOnlyBaseEnum::class,
            'VatRateType' => VatRateTypeEnum::class,
        ];
    }
}

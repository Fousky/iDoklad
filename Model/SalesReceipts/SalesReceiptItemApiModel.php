<?php

namespace Fousky\Component\iDoklad\Model\SalesReceipts;

use Fousky\Component\iDoklad\LOV\PriceTypeEnum;
use Fousky\Component\iDoklad\LOV\VatRateTypeEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|float getAmount()
 * @method null|int getCashVoucherItemId()
 * @method null|int getId()
 * @method null|string getName()
 * @method null|float getPrice()
 * @method null|int getPriceListItemId()
 * @method null|float getPriceTotalWithoutVat()
 * @method null|float getPriceTotalWithoutVatHc()
 * @method null|float getPriceTotalWithVat()
 * @method null|float getPriceTotalWithVatHc()
 * @method null|PriceTypeEnum getPriceType()
 * @method null|int getRank()
 * @method null|int getSalesReceiptId()
 * @method null|string getUnit()
 * @method null|float getVatRate()
 * @method null|VatRateTypeEnum getVatRateType()
 * @method null|float getVatTotal()
 * @method null|float getVatTotalHc()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class SalesReceiptItemApiModel extends iDokladAbstractModel
{
    public $Amount;
    public $CashVoucherItemId;
    public $Id;
    public $Name;
    public $Price;
    public $PriceListItemId;
    public $PriceTotalWithoutVat;
    public $PriceTotalWithoutVatHc;
    public $PriceTotalWithVat;
    public $PriceTotalWithVatHc;
    public $PriceType;
    public $Rank;
    public $SalesReceiptId;
    public $Unit;
    public $VatRate;
    public $VatRateType;
    public $VatTotal;
    public $VatTotalHc;

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'PriceType'   => PriceTypeEnum::class,
            'VatRateType' => VatRateTypeEnum::class,
        ];
    }
}

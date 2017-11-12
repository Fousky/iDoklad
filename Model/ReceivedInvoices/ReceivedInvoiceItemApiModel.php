<?php

namespace Fousky\Component\iDoklad\Model\ReceivedInvoices;

use Fousky\Component\iDoklad\LOV\IssuedInvoiceItemTypeEnum;
use Fousky\Component\iDoklad\LOV\PriceTypeEnum;
use Fousky\Component\iDoklad\LOV\VatRateTypeEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|float getAmount()
 * @method null|float getCustomVatRate()
 * @method null|\DateTime getDateCreated()
 * @method null|\DateTime getDateLastChange()
 * @method null|int getId()
 * @method null|bool getIsCustomVat()
 * @method null|IssuedInvoiceItemTypeEnum getItemType()
 * @method null|string getName()
 * @method null|float getPrice()
 * @method null|int getPriceListItemId()
 * @method null|float getPriceTotalWithoutVat()
 * @method null|float getPriceTotalWithoutVatHc()
 * @method null|float getPriceTotalWithVat()
 * @method null|float getPriceTotalWithVatHc()
 * @method null|PriceTypeEnum getPriceType()
 * @method null|float getPriceUnitHc()
 * @method null|string getUnit()
 * @method null|float getUnitPrice()
 * @method null|float getVatRate()
 * @method null|VatRateTypeEnum getVatRateType()
 * @method null|float getVatTotal()
 * @method null|float getVatTotalHc()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ReceivedInvoiceItemApiModel extends iDokladAbstractModel
{
    public $Amount;
    public $CustomVatRate;
    public $DateCreated;
    public $DateLastChange;
    public $Id;
    public $IsCustomVat;
    public $ItemType;
    public $Name;
    public $Price;
    public $PriceListItemId;
    public $PriceTotalWithoutVat;
    public $PriceTotalWithoutVatHc;
    public $PriceTotalWithVat;
    public $PriceTotalWithVatHc;
    public $PriceType;
    public $PriceUnitHc;
    public $Unit;
    public $UnitPrice;
    public $VatRate;
    public $VatRateType;
    public $VatTotal;
    public $VatTotalHc;

    /**
     * @return array
     */
    public static function getDateMap(): array
    {
        return [
            'DateCreated',
            'DateLastChange',
        ];
    }

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'ItemType' => IssuedInvoiceItemTypeEnum::class,
            'PriceType' => PriceTypeEnum::class,
            'VatRateType' => VatRateTypeEnum::class,
        ];
    }
}

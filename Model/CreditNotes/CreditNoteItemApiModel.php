<?php

namespace Fousky\Component\iDoklad\Model\CreditNotes;

use Fousky\Component\iDoklad\LOV\IssuedInvoiceItemTypeEnum;
use Fousky\Component\iDoklad\LOV\PriceTypeEnum;
use Fousky\Component\iDoklad\LOV\VatRateTypeEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|float getAmount()
 * @method null|string getCode()
 * @method null|\DateTime getDateLastChange()
 * @method null|int getId()
 * @method null|bool getIsRoundedItem()
 * @method null|bool getIsTaxMovement()
 * @method null|IssuedInvoiceItemTypeEnum getItemType()
 * @method null|string getName()
 * @method null|float getPrice()
 * @method null|int getPriceListItemId()
 * @method null|float getPriceTotalWithoutVat()
 * @method null|float getPriceTotalWithoutVatHc()
 * @method null|float getPriceTotalWithVat()
 * @method null|float getPriceTotalWithVatHc()
 * @method null|PriceTypeEnum getPriceType()
 * @method null|float getPriceUnitVat()
 * @method null|float getPriceUnitVatHc()
 * @method null|float getPriceUnitWithoutVat()
 * @method null|float getPriceUnitWithoutVatHc()
 * @method null|float getPriceUnitWithVat()
 * @method null|float getPriceUnitWithVatHc()
 * @method null|float getTotalPrice()
 * @method null|string getUnit()
 * @method null|float getUnitPrice()
 * @method null|float getVatRate()
 * @method null|VatRateTypeEnum getVatRateType()
 * @method null|float getVatTotal()
 * @method null|float getVatTotalHc()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 *
 * @see https://app.idoklad.cz/developer/Help/v2/cs/ResourceModel?modelName=CreditNoteItemApiModel
 */
class CreditNoteItemApiModel extends iDokladAbstractModel
{
    public $Amount;
    public $Code;
    public $DateLastChange;
    public $Id;
    public $IsRoundedItem;
    public $IsTaxMovement;
    public $ItemType;
    public $Name;
    public $Price;
    public $PriceListItemId;
    public $PriceTotalWithoutVat;
    public $PriceTotalWithoutVatHc;
    public $PriceTotalWithVat;
    public $PriceTotalWithVatHc;
    public $PriceType;
    public $PriceUnitVat;
    public $PriceUnitVatHc;
    public $PriceUnitWithoutVat;
    public $PriceUnitWithoutVatHc;
    public $PriceUnitWithVat;
    public $PriceUnitWithVatHc;
    public $TotalPrice;
    public $Unit;
    public $UnitPrice;
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
            'ItemType'    => IssuedInvoiceItemTypeEnum::class,
            'PriceType'   => PriceTypeEnum::class,
            'VatRateType' => VatRateTypeEnum::class,
        ];
    }

    /**
     * @return array
     */
    public static function getDateMap(): array
    {
        return [
            'DateLastChange',
        ];
    }
}

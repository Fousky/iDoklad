<?php

namespace Fousky\Component\iDoklad\Model\PriceListItems;

use Fousky\Component\iDoklad\LOV\PriceTypeEnum;
use Fousky\Component\iDoklad\LOV\VatRateTypeEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|float getAmount()
 * @method null|string getCode()
 * @method null|int getCurrencyId()
 * @method null|\DateTime getDateLastChange()
 * @method null|bool getHasStockMovement()
 * @method null|int getId()
 * @method null|string getName()
 * @method null|float getPrice()
 * @method null|PriceTypeEnum getPriceType()
 * @method null|string getUnit()
 * @method null|VatRateTypeEnum getVatRateType()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class PriceListPutModelV2 extends iDokladAbstractModel
{
    /** @Assert\Type(type="float") */
    public $Amount;

    /** @Assert\Type(type="string") */
    public $Code;

    /** @Assert\Type(type="int") */
    public $CurrencyId;

    /** @Assert\IsNull(message="This value is readonly.") */
    public $DateLastChange;

    /** @Assert\Type(type="bool") */
    public $HasStockMovement;

    /** @Assert\IsNull(message="This value is readonly.") */
    public $Id;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     */
    public $Name;

    /** @Assert\Type(type="float") */
    public $Price;

    /** @Assert\Type(type="Fousky\Component\iDoklad\LOV\PriceTypeEnum") */
    public $PriceType;

    /** @Assert\Type(type="string") */
    public $Unit;

    /** @Assert\Type(type="Fousky\Component\iDoklad\LOV\VatRateTypeEnum") */
    public $VatRateType;

    /**
     * @return array
     */
    public static function getDateMap(): array
    {
        return [
            'DateLastChange',
        ];
    }

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'PriceType' => PriceTypeEnum::class,
            'VatRateType' => VatRateTypeEnum::class,
        ];
    }
}

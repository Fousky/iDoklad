<?php

namespace Fousky\Component\iDoklad\Model\PriceListItems;

use Fousky\Component\iDoklad\LOV\PriceTypeEnum;
use Fousky\Component\iDoklad\LOV\VatRateTypeEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @method null|float getAmount()
 * @method null|string getBarCode()
 * @method null|string getCode()
 * @method null|int getCurrencyId()
 * @method null|\DateTime getDateLastChange()
 * @method null|bool getHasStockMovement()
 * @method null|int getId()
 * @method null|\DateTime getInitialDateStockBalance()
 * @method null|float getInitialStockBalance()
 * @method null|string getName()
 * @method null|float getPrice()
 * @method null|PriceTypeEnum getPriceType()
 * @method null|float getStockBalance()
 * @method null|string getUnit()
 * @method null|VatRateTypeEnum getVatRateType()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class PriceListApiModel extends iDokladAbstractModel
{
    /** @Assert\Type(type="float") */
    public $Amount;

    /** @Assert\Type(type="string") */
    public $BarCode;

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

    /** @Assert\DateTime() */
    public $InitialDateStockBalance;

    /** @Assert\Type(type="float") */
    public $InitialStockBalance;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     */
    public $Name;

    /** @Assert\Type(type="float") */
    public $Price;

    /** @Assert\Type(type="Fousky\Component\iDoklad\LOV\PriceTypeEnum") */
    public $PriceType;

    /** @Assert\Type(type="float") */
    public $StockBalance;

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
            'InitialDateStockBalance',
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

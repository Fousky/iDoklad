<?php

namespace Fousky\Component\iDoklad\Model\IssuedInvoices;

use Fousky\Component\iDoklad\LOV\PriceTypeEnum;
use Fousky\Component\iDoklad\LOV\VatRateTypeEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @method null|float getAmount()
 * @method null|int getId()
 * @method null|string getName()
 * @method null|int getPriceListItemId()
 * @method null|PriceTypeEnum getPriceType()
 * @method null|string getUnit()
 * @method null|float getUnitPrice()
 * @method null|VatRateTypeEnum getVatRateType()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class IssuedInvoiceItemApiModelWrite extends iDokladAbstractModel
{
    /** @Assert\Type(type="float") */
    public $Amount;

    /** @Assert\IsNull(message="This value is readonly.") */
    public $Id;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     * @Assert\Length(min="0", max="200")
     */
    public $Name;

    /** @Assert\Type(type="int") */
    public $PriceListItemId;

    /** @Assert\Type(type="Fousky\Component\iDoklad\LOV\PriceTypeEnum") */
    public $PriceType;

    /** @Assert\Type(type="string") */
    public $Unit;

    /** @Assert\Type(type="float") */
    public $UnitPrice;

    /** @Assert\Type(type="Fousky\Component\iDoklad\LOV\VatRateTypeEnum") */
    public $VatRateType;

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

<?php

namespace Fousky\Component\iDoklad\Model\VatRates;

use Fousky\Component\iDoklad\LOV\VatRateTypeEnum;
use Fousky\Component\iDoklad\Model\Countries\CountryApiModel;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|CountryApiModel getCountry()
 * @method null|int getCountryId()
 * @method null|\DateTime getDateLastChange()
 * @method null|\DateTime getDateValidityFrom()
 * @method null|\DateTime getDateValidityTo()
 * @method null|int getId()
 * @method null|string getName()
 * @method null|float getRate()
 * @method null|VatRateTypeEnum getRateType()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class VatRateApiModel extends iDokladAbstractModel
{
    public $Country;
    public $CountryId;
    public $DateLastChange;
    public $DateValidityFrom;
    public $DateValidityTo;
    public $Id;
    public $Name;
    public $Rate;
    public $RateType;

    /**
     * @return array
     */
    public static function getDateMap(): array
    {
        return [
            'DateLastChange',
            'DateValidityFrom',
            'DateValidityTo',
        ];
    }

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'Country' => CountryApiModel::class,
        ];
    }

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'RateType' => VatRateTypeEnum::class,
        ];
    }
}

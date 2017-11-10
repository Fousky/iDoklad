<?php

namespace Fousky\Component\iDoklad\Model\ConstantSymbol;

use Fousky\Component\iDoklad\Model\Countries\CountryApiModel;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|string getCode()
 * @method null|CountryApiModel getCountry()
 * @method null|int getCountryId()
 * @method null|\DateTime getDateLastChange()
 * @method null|int getId()
 * @method null|bool getIsDefault()
 * @method null|string getName()

 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ConstantSymbolApiModel extends iDokladAbstractModel
{
    public $Code;
    public $Country;
    public $CountryId;
    public $DateLastChange;
    public $Id;
    public $IsDefault;
    public $Name;

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
    public static function getDateMap(): array
    {
        return [
            'DateLastChange',
        ];
    }
}

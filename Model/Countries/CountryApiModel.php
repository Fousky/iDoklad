<?php

namespace Fousky\Component\iDoklad\Model\Countries;

use Fousky\Component\iDoklad\Model\Currencies\CurrencyApiModel;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|string getId()
 * @method null|string getCode()
 * @method null|string getCurrency()
 * @method null|string getCurrencyId()
 * @method null|\DateTime getDateLastChange()
 * @method null|string getName()
 * @method null|string getNameEnglish()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CountryApiModel extends iDokladAbstractModel
{
    public $Id;
    public $Code;
    public $Currency;
    public $CurrencyId;
    public $DateLastChange;
    public $Name;
    public $NameEnglish;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'Currency' => CurrencyApiModel::class,
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

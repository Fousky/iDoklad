<?php

namespace Fousky\Component\iDoklad\Model\ExchangeRates;

use Fousky\Component\iDoklad\Model\Currencies\CurrencyApiModel;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|string getId()
 * @method null|float getAmount()
 * @method null|CurrencyApiModel getCurrency()
 * @method null|int getCurrencyId()
 * @method null|\DateTime getDate()
 * @method null|\DateTime getDateLastChange()
 * @method null|int getExchangeListId()
 * @method null|float getExchangeRateValue()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ExchangeRateModel extends iDokladAbstractModel
{
    protected $Id;

    protected $Amount;

    protected $Currency;

    protected $CurrencyId;

    protected $Date;

    protected $DateLastChange;

    protected $ExchangeListId;

    protected $ExchangeRateValue;

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
            'Date',
            'DateLastChange',
        ];
    }
}

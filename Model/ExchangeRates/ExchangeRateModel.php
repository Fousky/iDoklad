<?php

namespace Fousky\Component\iDoklad\Model\ExchangeRates;

use Fousky\Component\iDoklad\Model\Currencies\CurrencyApiModel;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;

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
     * @param \stdClass $data
     *
     * @return iDokladModelInterface
     */
    public static function createFromStd(\stdClass $data): iDokladModelInterface
    {
        /** @var ExchangeRateModel $model */
        $model = parent::createFromStd($data);

        $model->Currency = CurrencyApiModel::createFromStd($model->Currency);

        return $model;
    }

    /**
     * @return array
     */
    public static function getDateTimeProperties(): array
    {
        return [
            'Date',
            'DateLastChange',
        ];
    }
}

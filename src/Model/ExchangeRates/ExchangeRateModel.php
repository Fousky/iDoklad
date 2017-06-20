<?php

namespace Fousky\Component\iDoklad\Model\ExchangeRates;

use Fousky\Component\iDoklad\Model\Currencies\CurrencyModel;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
use Fousky\Component\iDoklad\Util\DateUtil;
use Fousky\Component\iDoklad\Util\ResponseUtil;
use Psr\Http\Message\ResponseInterface;

/**
 * @method null|string getId()
 * @method null|float getAmount()
 * @method null|CurrencyModel getCurrency()
 * @method null|int getCurrencyId()
 * @method null|\DateTime getDate()
 * @method null|\DateTime getDateLastChange()
 * @method null|int getExchangeListId()
 * @method null|float getExchangeRateValue()
 *
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
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
        $model = new static();

        foreach ((array) $data as $key => $value) {

            if ($key === 'Currency') {
                $model->Currency = CurrencyModel::createFromStd($value);
                continue;
            }

            if (in_array($key, ['Date', 'DateLastChange'], true)) {
                $value = DateUtil::convertDateTime($value);
            }

            if (property_exists(__CLASS__, $key)) {
                $model->{$key} = $value;
            }
        }

        return $model;
    }
}

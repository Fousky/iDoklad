<?php

namespace Fousky\Component\iDoklad\Model\CashRegister;

use Fousky\Component\iDoklad\Model\Currencies\CurrencyApiModel;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;

/**
 * @method null|CurrencyApiModel getCurrency()
 * @method null|int getCurrencyId()
 * @method null|\DateTime getDateInitialState()
 * @method null|int getId()
 * @method null|float getInitialState()
 * @method null|string getName()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CashRegisterApiModel extends iDokladAbstractModel
{
    public $Currency;

    public $CurrencyId;

    public $DateInitialState;

    public $Id;

    public $InitialState;

    public $Name;

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
            'DateInitialState',
        ];
    }

    /**
     * @param \stdClass $data
     *
     * @return iDokladModelInterface
     */
    public static function createFromStd(\stdClass $data): iDokladModelInterface
    {
        /** @var CashRegisterApiModel $model */
        $model = parent::createFromStd($data);

        $currency = $model->Currency;

        if ($currency instanceof CurrencyApiModel) {
            $model->CurrencyId = $currency->getId();
        }

        return $model;
    }
}

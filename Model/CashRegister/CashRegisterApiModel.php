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
     * @param \stdClass $data
     *
     * @return iDokladModelInterface
     */
    public static function createFromStd(\stdClass $data): iDokladModelInterface
    {
        /** @var CashRegisterApiModel $model */
        $model = parent::createFromStd($data);

        if ($model->Currency instanceof \stdClass) {
            $model->Currency = CurrencyApiModel::createFromStd($model->Currency);

            if ($model->getCurrency() instanceof CurrencyApiModel) {
                $model->CurrencyId = $model->getCurrency()->getId();
            }
        }

        return $model;
    }

    /**
     * @return array
     */
    public static function getDateTimeProperties(): array
    {
        return [
            'DateInitialState',
        ];
    }
}

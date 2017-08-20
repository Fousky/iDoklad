<?php

namespace Fousky\Component\iDoklad\Model\CashRegister;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|int getCurrencyId()
 * @method null|\DateTime getDateInitialState()
 * @method null|int getId()
 * @method null|float getInitialState()
 * @method null|string getName()
 *
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
class CashRegisterApiModel extends iDokladAbstractModel
{
    public $CurrencyId;
    public $DateInitialState;
    public $Id;
    public $InitialState;
    public $Name;

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

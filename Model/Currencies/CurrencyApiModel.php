<?php

namespace Fousky\Component\iDoklad\Model\Currencies;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|string getId()
 * @method null|string getCode()
 * @method null|string getCountry()
 * @method null|string getName()
 * @method null|string getPriority()
 * @method null|string getSymbol()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CurrencyApiModel extends iDokladAbstractModel
{
    public $Id;

    public $Code;

    public $Country;

    public $Name;

    public $Priority;

    public $Symbol;
}

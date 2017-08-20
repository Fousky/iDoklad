<?php

namespace Fousky\Component\iDoklad\Model\Currencies;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method string getId()
 * @method string getCode()
 * @method string getCountry()
 * @method string getName()
 * @method string getPriority()
 * @method string getSymbol()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CurrencyModel extends iDokladAbstractModel
{
    public $Id;
    public $Code;
    public $Country;
    public $Name;
    public $Priority;
    public $Symbol;
}

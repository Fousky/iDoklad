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
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
class CurrencyModel extends iDokladAbstractModel
{
    protected $Id;
    protected $Code;
    protected $Country;
    protected $Name;
    protected $Priority;
    protected $Symbol;
}

<?php

namespace Fousky\Component\iDoklad\Model\Banks;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method string|null getId()
 * @method string|null getCode()
 * @method string|null getCountry()
 * @method string|null getCountryId()
 * @method string|null getDateLastChange()
 * @method string|null getIsOutOfDate()
 * @method string|null getName()
 * @method string|null getNumberCode()
 * @method string|null getSwift()
 *
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
class BankApiModel extends iDokladAbstractModel
{
    public $Id;
    public $Code;
    public $Country;
    public $CountryId;
    public $DateLastChange;
    public $IsOutOfDate;
    public $Name;
    public $NumberCode;
    public $Swift;
}

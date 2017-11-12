<?php

namespace Fousky\Component\iDoklad\Model\SalesOffice;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|string getCity()
 * @method null|int getCountryId()
 * @method null|int getDesignation()
 * @method null|int getId()
 * @method null|bool getIsRegisteredEet()
 * @method null|string getName()
 * @method null|string getPostalCode()
 * @method null|string getStreet()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class SalesOfficeApiModel extends iDokladAbstractModel
{
    public $City;
    public $CountryId;
    public $Designation;
    public $Id;
    public $IsRegisteredEet;
    public $Name;
    public $PostalCode;
    public $Street;
}

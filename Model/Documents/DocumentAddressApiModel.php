<?php

namespace Fousky\Component\iDoklad\Model\Documents;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|string getAccountNumber()
 * @method null|string getBank()
 * @method null|string getBankNumberCode()
 * @method null|string getCity()
 * @method null|string getCountry()
 * @method null|int getCountryId()
 * @method null|\DateTime getDateLastChange()
 * @method null|string getEmail()
 * @method null|string getFax()
 * @method null|string getFirstname()
 * @method null|string getIban()
 * @method null|int getId()
 * @method null|string getIdentificationNumber()
 * @method null|string getMobile()
 * @method null|string getNickName()
 * @method null|string getPhone()
 * @method null|string getPostalCode()
 * @method null|string getStreet()
 * @method null|string getSurname()
 * @method null|string getSwift()
 * @method null|string getTitle()
 * @method null|string getVatIdentificationNumber()
 * @method null|string getVatIdentificationNumberSk()
 * @method null|string getWww()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class DocumentAddressApiModel extends iDokladAbstractModel
{
    public $AccountNumber;

    public $Bank;

    public $BankNumberCode;

    public $City;

    public $Country;

    public $CountryId;

    public $DateLastChange;

    public $Email;

    public $Fax;

    public $Firstname;

    public $Iban;

    public $Id;

    public $IdentificationNumber;

    public $Mobile;

    public $NickName;

    public $Phone;

    public $PostalCode;

    public $Street;

    public $Surname;

    public $Swift;

    public $Title;

    public $VatIdentificationNumber;

    public $VatIdentificationNumberSk;

    public $Www;

    /**
     * @return array
     */
    public static function getDateMap(): array
    {
        return [
            'DateLastChange',
        ];
    }
}

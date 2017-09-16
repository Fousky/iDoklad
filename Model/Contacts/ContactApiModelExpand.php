<?php

namespace Fousky\Component\iDoklad\Model\Contacts;

use Fousky\Component\iDoklad\LOV\CreditCheckStatusDokladEnum;
use Fousky\Component\iDoklad\Model\Banks\BankAccountApiCollectionModel;
use Fousky\Component\iDoklad\Model\Banks\BankAccountApiModel;
use Fousky\Component\iDoklad\Model\Countries\CountryApiModel;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|string getAddressIdg()
 * @method null|BankAccountApiCollectionModel getBankAccounts()
 * @method null|string getCity()
 * @method null|string getCompanyName()
 * @method null|CountryApiModel getCountry()
 * @method null|int getCountryId()
 * @method null|CreditCheckStatusDokladEnum getCreditCheck()
 * @method null|\DateTime getDateLastChange()
 * @method null|BankAccountApiModel getDefaultBankAccount()
 * @method null|float getDiscountPercentage()
 * @method null|string getEmail()
 * @method null|string getFax()
 * @method null|string getFirstname()
 * @method null|int getId()
 * @method null|string getIdentificationNumber()
 * @method null|bool getIsRegisteredForVatOnPay()
 * @method null|bool getIsSendReminder()
 * @method null|string getMobile()
 * @method null|string getPhone()
 * @method null|string getPostalCode()
 * @method null|string getStreet()
 * @method null|string getSurname()
 * @method null|string getTitle()
 * @method null|string getVatIdentificationNumber()
 * @method null|string getVatIdentificationNumberSk()
 * @method null|string getWww()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ContactApiModelExpand extends iDokladAbstractModel
{
    public $AddressIdg;
    public $BankAccounts;
    public $City;
    public $CompanyName;
    public $Country;
    public $CountryId;
    public $CreditCheck;
    public $DateLastChange;
    public $DefaultBankAccount;
    public $DiscountPercentage;
    public $Email;
    public $Fax;
    public $Firstname;
    public $Id;
    public $IdentificationNumber;
    public $IsRegisteredForVatOnPay;
    public $IsSendReminder;
    public $Mobile;
    public $Phone;
    public $PostalCode;
    public $Street;
    public $Surname;
    public $Title;
    public $VatIdentificationNumber;
    public $VatIdentificationNumberSk;
    public $Www;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'BankAccounts'       => BankAccountApiCollectionModel::class,
            'Country'            => CountryApiModel::class,
            'DefaultBankAccount' => BankAccountApiModel::class,
        ];
    }

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'CreditCheck' => CreditCheckStatusDokladEnum::class,
        ];
    }

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

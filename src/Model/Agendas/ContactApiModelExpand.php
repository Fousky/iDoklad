<?php

namespace Fousky\Component\iDoklad\Model\Agendas;

use Fousky\Component\iDoklad\Model\Banks\BankAccountApiCollectionModel;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
use Fousky\Component\iDoklad\Model\Countries\CountryModel;
use Fousky\Component\iDoklad\Model\Banks\BankAccountApiModel;

/**
 * @method null|int getAddressIdg()
 * @method null|BankAccountApiCollectionModel getBankAccounts()
 * @method null|string getCity()
 * @method null|string getCompanyName()
 * @method null|CountryModel getCountry()
 * @method null|int getCountryId()
 * @method null getCreditCheck()
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
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
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
     * @param \stdClass $data
     *
     * @return iDokladModelInterface
     */
    public static function createFromStd(\stdClass $data): iDokladModelInterface
    {
        /** @var ContactApiModelExpand $model */
        $model = parent::createFromStd($data);

        if (!empty($model->BankAccounts) && is_array($model->BankAccounts)) {
            $model->BankAccounts = BankAccountApiCollectionModel::createFromArray($model->BankAccounts);
        }

        if ($model->Country instanceof \stdClass) {
            $model->Country = CountryModel::createFromStd($model->Country);
        }

        if ($model->DefaultBankAccount instanceof \stdClass) {
            $model->DefaultBankAccount = BankAccountApiModel::createFromStd($model->DefaultBankAccount);
        }

        return $model;
    }

    /**
     * @return array
     */
    public static function getDateTimeProperties(): array
    {
        return [
            'DateLastChange',
        ];
    }
}

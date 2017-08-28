<?php

namespace Fousky\Component\iDoklad\Model\Contacts;

use Fousky\Component\iDoklad\Model\BankAccounts\BankAccountPostApiModel;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @method null|string getCity()
 * @method null|string getCompanyName()
 * @method null|int getCountryId()
 * @method null|BankAccountPostApiModel getDefaultBankAccount()
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
class ContactPostApiModel extends iDokladAbstractModel
{
    public $City;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min="0", max="200")
     */
    public $CompanyName;

    /**
     * @Assert\NotBlank()
     */
    public $CountryId;

    /**
     * @var BankAccountPostApiModel
     *
     * @Assert\Valid()
     */
    public $DefaultBankAccount;
    public $DiscountPercentage;
    public $Email;
    public $Fax;
    public $Firstname;

    /**
     * @Assert\IsNull()
     */
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
            'DefaultBankAccount' => BankAccountPostApiModel::class,
        ];
    }
}

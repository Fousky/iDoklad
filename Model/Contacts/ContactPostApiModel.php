<?php

namespace Fousky\Component\iDoklad\Model\Contacts;

use Fousky\Component\iDoklad\Model\BankAccounts\BankAccountPostApiModel;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
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
     */
    public $CompanyName;

    /**
     * @Assert\NotBlank()
     */
    public $CountryId;
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
     * @param \stdClass $data
     *
     * @return iDokladModelInterface
     */
    public static function createFromStd(\stdClass $data): iDokladModelInterface
    {
        /** @var static $model */
        $model = parent::createFromStd($data);

        if ($model->getDefaultBankAccount() instanceof \stdClass) {
            $model->DefaultBankAccount = BankAccountPostApiModel::createFromStd($model->DefaultBankAccount);
        }

        return $model;
    }
}

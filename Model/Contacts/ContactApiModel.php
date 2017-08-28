<?php

namespace Fousky\Component\iDoklad\Model\Contacts;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @deprecated
 * @TODO: refactor this model class!
 *
 * @method string getAddressIdg()
 * @method string getCreditCheck()
 * @method null|string|\DateTime getDateLastChange()
 * @method string getDefaultBankAccount()
 * @method string getId()
 * @method string getCompanyName()
 * @method string getCountryId()
 * @method string getIsRegisteredForVatOnPay()
 * @method string getCity()
 * @method string getDiscountPercentage()
 * @method string getEmail()
 * @method string getFax()
 * @method string getFirstname()
 * @method string getIdentificationNumber()
 * @method string getIsSendReminder()
 * @method string getMobile()
 * @method string getPhone()
 * @method string getPostalCode()
 * @method string getStreet()
 * @method string getSurname()
 * @method string getTitle()
 * @method string getVatIdentificationNumber()
 * @method string getVatIdentificationNumberSk()
 * @method string getWww()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ContactApiModel extends iDokladAbstractModel
{
    public $Id;
    public $AddressIdg;
    public $CreditCheck;
    public $DateLastChange;
    public $DefaultBankAccount;
    public $CompanyName;
    public $CountryId;
    public $IsRegisteredForVatOnPay;
    public $City;
    public $DiscountPercentage;
    public $Email;
    public $Fax;
    public $Www;
    public $Title;
    public $Firstname;
    public $Surname;
    public $IdentificationNumber;
    public $IsSendReminder;
    public $Mobile;
    public $Phone;
    public $Street;
    public $PostalCode;
    public $VatIdentificationNumber;
    public $VatIdentificationNumberSk;

    /**
     * @return string
     */
    public function getFullname(): string
    {
        return trim(sprintf('%s %s', $this->getFirstname(), $this->getSurname()));
    }

    /**
     * @param array $options
     *
     * @return array
     */
    public function toArray(array $options = []): array
    {
        return [
//            'Id' => $this->Id,
            'AddressIdg'     => $this->AddressIdg,
            'CreditCheck'    => $this->CreditCheck,
            'DateLastChange' => $this->getDateLastChange() instanceof \DateTime
                ? $this->getDateLastChange()->format(\DateTime::ATOM)
                : $this->getDateLastChange(),
            'DefaultBankAccount' => $this->DefaultBankAccount,
            'CompanyName'        => $this->CompanyName,
            'CountryId'          => $this->CountryId,
//            'IsRegisteredForVatOnPay' => $this->IsRegisteredForVatOnPay,
            'City'                      => $this->City,
            'DiscountPercentage'        => $this->DiscountPercentage,
            'Email'                     => $this->Email,
            'Fax'                       => $this->Fax,
            'Www'                       => $this->Www,
            'Title'                     => $this->Title,
            'Firstname'                 => $this->Firstname,
            'Surname'                   => $this->Surname,
            'IdentificationNumber'      => $this->IdentificationNumber,
            'IsSendReminder'            => $this->IsSendReminder,
            'Mobile'                    => $this->Mobile,
            'Phone'                     => $this->Phone,
            'Street'                    => $this->Street,
            'PostalCode'                => $this->PostalCode,
            'VatIdentificationNumber'   => $this->VatIdentificationNumber,
            'VatIdentificationNumberSk' => $this->VatIdentificationNumberSk,
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

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
 * @method null|string getIdentificationNumber()
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
class ContactPatchApiModel extends iDokladAbstractModel
{
    /**
     * @Assert\Length(min="0", max="50")
     */
    public $City;

    /**
     * @Assert\Length(min="0", max="200")
     */
    public $CompanyName;
    public $CountryId;

    /**
     * @var null|BankAccountPostApiModel
     *
     * @Assert\Valid()
     */
    public $DefaultBankAccount;
    public $DiscountPercentage;

    /**
     * @Assert\Length(min="0", max="50")
     */
    public $Email;

    /**
     * @Assert\Length(min="0", max="20")
     */
    public $Fax;

    /**
     * @Assert\Length(min="0", max="50")
     */
    public $Firstname;

    /**
     * @Assert\Length(min="0", max="20")
     */
    public $IdentificationNumber;
    public $IsSendReminder;

    /**
     * @Assert\Length(min="0", max="20")
     */
    public $Mobile;

    /**
     * @Assert\Length(min="0", max="20")
     */
    public $Phone;

    /**
     * @Assert\Length(min="0", max="11")
     */
    public $PostalCode;

    /**
     * @Assert\Length(min="0", max="100")
     */
    public $Street;

    /**
     * @Assert\Length(min="0", max="50")
     */
    public $Surname;

    /**
     * @Assert\Length(min="0", max="50")
     */
    public $Title;

    /**
     * @Assert\Length(min="0", max="20")
     */
    public $VatIdentificationNumber;

    /**
     * @Assert\Length(min="0", max="20")
     */
    public $VatIdentificationNumberSk;

    /**
     * @Assert\Length(min="0", max="50")
     */
    public $Www;

    /**
     * @param BankAccountPostApiModel|null $bankAccount
     * @param array                        $properties
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(BankAccountPostApiModel $bankAccount = null, array $properties = [])
    {
        $this->DefaultBankAccount = $bankAccount;

        foreach ($properties as $key => $value) {
            if (!property_exists($this, $key)) {
                throw new \InvalidArgumentException(sprintf(
                    'Property %s of class %s does not exists.',
                    $key,
                    __CLASS__
                ));
            }

            $this->{$key} = $value;
        }
    }

    /**
     * @return array
     */
    public function getAvailableProperties(): array
    {
        return [
            'City',
            'CompanyName',
            'CountryId',
            'DefaultBankAccount',
            'DiscountPercentage',
            'Email',
            'Fax',
            'Firstname',
            'IdentificationNumber',
            'IsSendReminder',
            'Mobile',
            'Phone',
            'PostalCode',
            'Street',
            'Surname',
            'Title',
            'VatIdentificationNumber',
            'VatIdentificationNumberSk',
            'Www',
        ];
    }
}

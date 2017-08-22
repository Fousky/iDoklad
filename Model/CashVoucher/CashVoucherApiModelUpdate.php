<?php

namespace Fousky\Component\iDoklad\Model\CashVoucher;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|int getCashRegisterId()
 * @method null|\DateTime getDateOfTransaction()
 * @method null|float getExchangeRate()
 * @method null|float getExchangeRateAmount()
 * @method null|CashVoucherItemApiModelUpdate getItem()
 * @method null|int getMyCompanyDocumentAddressId()
 * @method null|int getPartnerContactId()
 * @method null|int getPartnerDocumentAddressId()
 * @method null|string getPerson()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CashVoucherApiModelUpdate extends iDokladAbstractModel
{
    public $CashRegisterId;
    public $DateOfTransaction;
    public $ExchangeRate;
    public $ExchangeRateAmount;
    public $Item;
    public $MyCompanyDocumentAddressId;
    public $PartnerContactId;
    public $PartnerDocumentAddressId;
    public $Person;

    /**
     * @param CashVoucherItemApiModelUpdate $Item
     * @param array                         $properties Properties key=>value see getAvailableProperties()
     */
    public function __construct(CashVoucherItemApiModelUpdate $Item, array $properties = [])
    {
        $this->Item = $Item;

        foreach ($properties as $property => $value) {
            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }

    /**
     * @return array
     */
    public function getAvailableProperties(): array
    {
        return [
            'CashRegisterId',
            'DateOfTransaction',
            'ExchangeRate',
            'ExchangeRateAmount',
            'MyCompanyDocumentAddressId',
            'PartnerContactId',
            'PartnerDocumentAddressId',
            'Person',
        ];
    }
}

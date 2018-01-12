<?php

namespace Fousky\Component\iDoklad\Model\CashVoucher;

use Fousky\Component\iDoklad\LOV\EetResponsibilityEnum;
use Fousky\Component\iDoklad\LOV\ExportedStateEnum;
use Fousky\Component\iDoklad\LOV\MovementTypeEnum;
use Fousky\Component\iDoklad\Model\CashRegister\CashRegisterApiModel;
use Fousky\Component\iDoklad\Model\Contacts\ContactApiModel;
use Fousky\Component\iDoklad\Model\Currencies\CurrencyApiModel;
use Fousky\Component\iDoklad\Model\Documents\DocumentAddressApiModel;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\RegisteredSale\RegisteredSaleApiModel;

/**
 * @method null|CashRegisterApiModel getCashRegister()
 * @method null|int getCashRegisterId()
 * @method null|CurrencyApiModel getCurrency()
 * @method null|int getCurrencyId()
 * @method null|\DateTime getDateLastChange()
 * @method null|\DateTime getDateOfTransaction()
 * @method null|string getDocumentNumber()
 * @method null|int getDocumentSerialNumber()
 * @method null|EetResponsibilityEnum getEetResponsibility()
 * @method null|float getExchangeRate()
 * @method null|float getExchangeRateAmount()
 * @method null|ExportedStateEnum getExported()
 * @method null|int getId()
 * @method null|bool getIsEet()
 * @method null|bool getIsSummarySalesReceipt()
 * @method null|CashVoucherItemApiModel getItem()
 * @method null|MovementTypeEnum getMovementType()
 * @method null|DocumentAddressApiModel getMyCompanyDocumentAddress()
 * @method null|int getMyCompanyDocumentAddressId()
 * @method null|ContactApiModel getPartnerContact()
 * @method null|int getPartnerContactId()
 * @method null|DocumentAddressApiModel getPartnerDocumentAddress()
 * @method null|int getPartnerDocumentAddressId()
 * @method null|string getPerson()
 * @method null|RegisteredSaleApiModel getRegisteredSale()
 * @method null|\DateTime getSummarySalesReceiptDate()
 * @method null|float getTotalVat()
 * @method null|float getTotalVatHc()
 * @method null|float getTotalWithoutVat()
 * @method null|float getTotalWithoutVatHc()
 * @method null|float getTotalWithVat()
 * @method null|float getTotalWithVatHc()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CashVoucherApiModelExpand extends iDokladAbstractModel
{
    public $CashRegister;

    public $CashRegisterId;

    public $Currency;

    public $CurrencyId;

    public $DateLastChange;

    public $DateOfTransaction;

    public $DocumentNumber;

    public $DocumentSerialNumber;

    public $EetResponsibility;

    public $ExchangeRate;

    public $ExchangeRateAmount;

    public $Exported;

    public $Id;

    public $IsEet;

    public $IsSummarySalesReceipt;

    public $Item;

    public $MovementType;

    public $MyCompanyDocumentAddress;

    public $MyCompanyDocumentAddressId;

    public $PartnerContact;

    public $PartnerContactId;

    public $PartnerDocumentAddress;

    public $PartnerDocumentAddressId;

    public $Person;

    public $RegisteredSale;

    public $SummarySalesReceiptDate;

    public $TotalVat;

    public $TotalVatHc;

    public $TotalWithoutVat;

    public $TotalWithoutVatHc;

    public $TotalWithVat;

    public $TotalWithVatHc;

    /**
     * @return array
     */
    public static function getDateMap(): array
    {
        return [
            'DateLastChange',
            'DateOfTransaction',
            'SummarySalesReceiptDate',
        ];
    }

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'CashRegister' => CashRegisterApiModel::class,
            'Currency' => CurrencyApiModel::class,
            'Item' => CashVoucherItemApiModel::class,
            'MyCompanyDocumentAddress' => DocumentAddressApiModel::class,
            'PartnerContact' => ContactApiModel::class,
            'RegisteredSale' => RegisteredSaleApiModel::class,
        ];
    }

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'EetResponsibility' => EetResponsibilityEnum::class,
            'Exported' => ExportedStateEnum::class,
            'MovementType' => MovementTypeEnum::class,
        ];
    }
}

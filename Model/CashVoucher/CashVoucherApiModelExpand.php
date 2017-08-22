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
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
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
    public static function getDateTimeProperties(): array
    {
        return [
            'DateLastChange',
            'DateOfTransaction',
            'SummarySalesReceiptDate',
        ];
    }

    /**
     * @param \stdClass $data
     *
     * @return iDokladModelInterface
     */
    public static function createFromStd(\stdClass $data): iDokladModelInterface
    {
        /** @var CashVoucherApiModelExpand $model */
        $model = parent::createFromStd($data);

        if ($model->getCashRegister() instanceof \stdClass) {
            $model->CashRegister = CashRegisterApiModel::createFromStd($model->CashRegister);
        }
        if ($model->getCurrency() instanceof \stdClass) {
            $model->Currency = CurrencyApiModel::createFromStd($model->Currency);
        }
        if ($model->getEetResponsibility() !== null) {
            $model->EetResponsibility = new EetResponsibilityEnum((int) $model->EetResponsibility);
        }
        if ($model->getExported() !== null) {
            $model->Exported = new ExportedStateEnum((int) $model->Exported);
        }
        if ($model->getItem() instanceof \stdClass) {
            $model->Item = CashVoucherItemApiModel::createFromStd($model->Item);
        }
        if ($model->getMovementType() !== null) {
            $model->MovementType = new MovementTypeEnum((int) $model->MovementType);
        }
        if ($model->getMyCompanyDocumentAddress() instanceof \stdClass) {
            $model->MyCompanyDocumentAddress = DocumentAddressApiModel::createFromStd($model->MyCompanyDocumentAddress);
        }
        if ($model->getPartnerContact() instanceof \stdClass) {
            $model->PartnerContact = ContactApiModel::createFromStd($model->PartnerContact);
        }
        if ($model->getRegisteredSale() instanceof \stdClass) {
            $model->RegisteredSale = RegisteredSaleApiModel::createFromStd($model->RegisteredSale);
        }

        return $model;
    }
}

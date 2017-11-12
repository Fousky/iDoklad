<?php

namespace Fousky\Component\iDoklad\Model\ReceivedInvoices;

use Fousky\Component\iDoklad\LOV\ExportedStateEnum;
use Fousky\Component\iDoklad\LOV\PaymentStatusEnum;
use Fousky\Component\iDoklad\LOV\VatOnPayStatusEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|string getAttachmentFileName()
 * @method null|int getCurrencyId()
 * @method null|\DateTime getDateCreated()
 * @method null|\DateTime getDateLastChange()
 * @method null|\DateTime getDateOfAccountingEvent()
 * @method null|\DateTime getDateOfIssue()
 * @method null|\DateTime getDateOfMaturity()
 * @method null|\DateTime getDateOfPayment()
 * @method null|\DateTime getDateOfReceiving()
 * @method null|\DateTime getDateOfTaxing()
 * @method null|\DateTime getDateOfVatApplication()
 * @method null|string getDescription()
 * @method null|string getDocumentNumber()
 * @method null|int getDocumentSerialNumber()
 * @method null|float getExchangeRate()
 * @method null|float getExchangeRateAmount()
 * @method null|ExportedStateEnum getExported()
 * @method null|int getId()
 * @method null|bool getIsSentToAccountant()
 * @method null|ReceivedInvoiceItemApiModel[] getItems()
 * @method null|int getMyCompanyDocumentAddressId()
 * @method null|string getNote()
 * @method null|string getOrderNumber()
 * @method null|int getPaymentOptionId()
 * @method null|PaymentStatusEnum getPaymentStatus()
 * @method null|string getReceivedDocumentNumber()
 * @method null|int getSupplierDocumentAddressId()
 * @method null|int getSupplierId()
 * @method null|float getTotalPaid()
 * @method null|float getTotalPaidHc()
 * @method null|float getTotalVat()
 * @method null|float getTotalVatHc()
 * @method null|float getTotalWithoutVat()
 * @method null|float getTotalWithoutVatHc()
 * @method null|float getTotalWithVat()
 * @method null|float getTotalWithVatHc()
 * @method null|string getVariableSymbol()
 * @method null|VatOnPayStatusEnum getVatOnPayStatus()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ReceivedInvoiceApiModel extends iDokladAbstractModel
{
    public $AttachmentFileName;
    public $CurrencyId;
    public $DateCreated;
    public $DateLastChange;
    public $DateOfAccountingEvent;
    public $DateOfIssue;
    public $DateOfMaturity;
    public $DateOfPayment;
    public $DateOfReceiving;
    public $DateOfTaxing;
    public $DateOfVatApplication;
    public $Description;
    public $DocumentNumber;
    public $DocumentSerialNumber;
    public $ExchangeRate;
    public $ExchangeRateAmount;
    public $Exported;
    public $Id;
    public $IsSentToAccountant;
    public $Items;
    public $MyCompanyDocumentAddressId;
    public $Note;
    public $OrderNumber;
    public $PaymentOptionId;
    public $PaymentStatus;
    public $ReceivedDocumentNumber;
    public $SupplierDocumentAddressId;
    public $SupplierId;
    public $TotalPaid;
    public $TotalPaidHc;
    public $TotalVat;
    public $TotalVatHc;
    public $TotalWithoutVat;
    public $TotalWithoutVatHc;
    public $TotalWithVat;
    public $TotalWithVatHc;
    public $VariableSymbol;
    public $VatOnPayStatus;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'Items' => ReceivedInvoiceItemApiModel::class,
        ];
    }

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'Exported' => ExportedStateEnum::class,
            'PaymentStatus' => PaymentStatusEnum::class,
            'VatOnPayStatus' => VatOnPayStatusEnum::class,
        ];
    }

    /**
     * @return array
     */
    public static function getDateMap(): array
    {
        return [
            'DateCreated',
            'DateLastChange',
            'DateOfAccountingEvent',
            'DateOfIssue',
            'DateOfMaturity',
            'DateOfPayment',
            'DateOfReceiving',
            'DateOfTaxing',
            'DateOfVatApplication',
        ];
    }
}

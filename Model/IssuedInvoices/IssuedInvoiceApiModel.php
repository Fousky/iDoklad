<?php

namespace Fousky\Component\iDoklad\Model\IssuedInvoices;

use Fousky\Component\iDoklad\LOV\EetResponsibilityEnum;
use Fousky\Component\iDoklad\LOV\ExportedStateEnum;
use Fousky\Component\iDoklad\LOV\PaymentStatusEnum;
use Fousky\Component\iDoklad\LOV\VatOnPayStatusEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|string getAttachmentFileName()
 * @method null|float getBaseTaxBasicRate()
 * @method null|float getBaseTaxBasicRateHc()
 * @method null|float getBaseTaxReducedRate1()
 * @method null|float getBaseTaxReducedRate1Hc()
 * @method null|float getBaseTaxReducedRate2()
 * @method null|float getBaseTaxReducedRate2Hc()
 * @method null|float getBaseTaxZeroRate()
 * @method null|float getBaseTaxZeroRateHc()
 * @method null|int getConstantSymbolId()
 * @method null|int getCurrencyId()
 * @method null|\DateTime getDateLastChange()
 * @method null|\DateTime getDateOfAccountingEvent()
 * @method null|\DateTime getDateOfIssue()
 * @method null|\DateTime getDateOfLastReminder()
 * @method null|\DateTime getDateOfMaturity()
 * @method null|\DateTime getDateOfPayment()
 * @method null|\DateTime getDateOfTaxing()
 * @method null|\DateTime getDateOfVatApplication()
 * @method null|string getDescription()
 * @method null|float getDiscount()
 * @method null|string getDocumentNumber()
 * @method null|int getDocumentSerialNumber()
 * @method null|EetResponsibilityEnum getEetResponsibility()
 * @method null|float getExchangeRate()
 * @method null|float getExchangeRateAmount()
 * @method null|ExportedStateEnum getExported()
 * @method null|int getId()
 * @method null|bool getIsEet()
 * @method null|bool getIsSentToAccountant()
 * @method null|bool getIsSentToPurchaser()
 * @method null|IssuedInvoiceItemApiModel[] getIssuedInvoiceItems()
 * @method null|string getItemsTextPrefix()
 * @method null|string getItemsTextSuffix()
 * @method null|int getLanguageId()
 * @method null|int getMaturity()
 * @method null|int getMyCompanyDocumentAdrressId()
 * @method null|string getNote()
 * @method null|int getNumericSequenceId()
 * @method null|string getOrderNumber()
 * @method null|int getPaymentOptionId()
 * @method null|PaymentStatusEnum getPaymentStatus()
 * @method null|int getPurchaserDocumentAddressId()
 * @method null|int getPurchaserId()
 * @method null|int getRemindersCount()
 * @method null|string getReportColorValue()
 * @method null|int getReportId()
 * @method null|float getRoundingDifference()
 * @method null|float getTaxBasicRate()
 * @method null|float getTaxBasicRateHc()
 * @method null|float getTaxReducedRate1()
 * @method null|float getTaxReducedRate1Hc()
 * @method null|float getTaxReducedRate2()
 * @method null|float getTaxReducedRate2Hc()
 * @method null|float getTotalBasicRate()
 * @method null|float getTotalBasicRateHc()
 * @method null|float getTotalReducedRate1()
 * @method null|float getTotalReducedRate1Hc()
 * @method null|float getTotalReducedRate2()
 * @method null|float getTotalReducedRate2Hc()
 * @method null|float getTotalVat()
 * @method null|float getTotalVatHc()
 * @method null|float getTotalWithoutVat()
 * @method null|float getTotalWithoutVatHc()
 * @method null|float getTotalWithVat()
 * @method null|float getTotalWithVatHc()
 * @method null|string getVariableSymbol()
 * @method null|VatOnPayStatusEnum getVatOnPayStatus()
 * @method null|float getVatRateBasic()
 * @method null|float getVatRateReduced1()
 * @method null|float getVatRateReduced2()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class IssuedInvoiceApiModel extends iDokladAbstractModel
{
    public $AttachmentFileName;
    public $BaseTaxBasicRate;
    public $BaseTaxBasicRateHc;
    public $BaseTaxReducedRate1;
    public $BaseTaxReducedRate1Hc;
    public $BaseTaxReducedRate2;
    public $BaseTaxReducedRate2Hc;
    public $BaseTaxZeroRate;
    public $BaseTaxZeroRateHc;
    public $ConstantSymbolId;
    public $CurrencyId;
    public $DateLastChange;
    public $DateOfAccountingEvent;
    public $DateOfIssue;
    public $DateOfLastReminder;
    public $DateOfMaturity;
    public $DateOfPayment;
    public $DateOfTaxing;
    public $DateOfVatApplication;
    public $Description;
    public $Discount;
    public $DocumentNumber;
    public $DocumentSerialNumber;
    public $EetResponsibility;
    public $ExchangeRate;
    public $ExchangeRateAmount;
    public $Exported;
    public $Id;
    public $IsEet;
    public $IsSentToAccountant;
    public $IsSentToPurchaser;
    public $IssuedInvoiceItems;
    public $ItemsTextPrefix;
    public $ItemsTextSuffix;
    public $LanguageId;
    public $Maturity;
    public $MyCompanyDocumentAdrressId;
    public $Note;
    public $NumericSequenceId;
    public $OrderNumber;
    public $PaymentOptionId;
    public $PaymentStatus;
    public $PurchaserDocumentAddressId;
    public $PurchaserId;
    public $RemindersCount;
    public $ReportColorValue;
    public $ReportId;
    public $RoundingDifference;
    public $TaxBasicRate;
    public $TaxBasicRateHc;
    public $TaxReducedRate1;
    public $TaxReducedRate1Hc;
    public $TaxReducedRate2;
    public $TaxReducedRate2Hc;
    public $TotalBasicRate;
    public $TotalBasicRateHc;
    public $TotalReducedRate1;
    public $TotalReducedRate1Hc;
    public $TotalReducedRate2;
    public $TotalReducedRate2Hc;
    public $TotalVat;
    public $TotalVatHc;
    public $TotalWithoutVat;
    public $TotalWithoutVatHc;
    public $TotalWithVat;
    public $TotalWithVatHc;
    public $VariableSymbol;
    public $VatOnPayStatus;
    public $VatRateBasic;
    public $VatRateReduced1;
    public $VatRateReduced2;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'IssuedInvoiceItems' => IssuedInvoiceItemApiModel::class,
        ];
    }

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'EetResponsibility' => EetResponsibilityEnum::class,
            'Exported'          => ExportedStateEnum::class,
            'PaymentStatus'     => PaymentStatusEnum::class,
            'VatOnPayStatus'    => VatOnPayStatusEnum::class,
        ];
    }

    /**
     * @return array
     */
    public static function getDateMap(): array
    {
        return [
            'DateLastChange',
            'DateOfAccountingEvent',
            'DateOfIssue',
            'DateOfLastReminder',
            'DateOfMaturity',
            'DateOfPayment',
            'DateOfTaxing',
            'DateOfVatApplication',
        ];
    }
}

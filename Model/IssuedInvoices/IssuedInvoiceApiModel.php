<?php

namespace Fousky\Component\iDoklad\Model\IssuedInvoices;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method string|null getAttachmentFileName()
 * @method string|null getBaseTaxBasicRate()
 * @method string|null getBaseTaxBasicRateHc()
 * @method string|null getBaseTaxReducedRate1()
 * @method string|null getBaseTaxReducedRate1Hc()
 * @method string|null getBaseTaxReducedRate2()
 * @method string|null getBaseTaxReducedRate2Hc()
 * @method string|null getBaseTaxZeroRate()
 * @method string|null getBaseTaxZeroRateHc()
 * @method string|null getConstantSymbolId()
 * @method string|null getCurrencyId()
 * @method string|\DateTime getDateLastChange()
 * @method string|\DateTime getDateOfAccountingEvent()
 * @method string|\DateTime getDateOfIssue()
 * @method string|\DateTime getDateOfLastReminder()
 * @method string|\DateTime getDateOfMaturity()
 * @method string|\DateTime getDateOfPayment()
 * @method string|\DateTime getDateOfTaxing()
 * @method string|\DateTime getDateOfVatApplication()
 * @method string|null getDescription()
 * @method string|null getDiscount()
 * @method string|null getDocumentNumber()
 * @method string|null getDocumentSerialNumber()
 * @method string|null getEetResponsibility()
 * @method string|null getExchangeRate()
 * @method string|null getExchangeRateAmount()
 * @method string|null getExported()
 * @method string|null getId()
 * @method string|null getIsEet()
 * @method string|null getIsSentToAccountant()
 * @method string|null getIsSentToPurchaser()
 * @method string|null getIssuedInvoiceItems()
 * @method string|null getItemsTextPrefix()
 * @method string|null getItemsTextSuffix()
 * @method string|null getLanguageId()
 * @method string|null getLinks()
 * @method string|null getMaturity()
 * @method string|null getMyCompanyDocumentAdrressId()
 * @method string|null getNote()
 * @method string|null getNumericSequenceId()
 * @method string|null getOrderNumber()
 * @method string|null getPaymentOptionId()
 * @method string|null getPaymentStatus()
 * @method string|null getPurchaserDocumentAddressId()
 * @method string|null getPurchaserId()
 * @method string|null getRemindersCount()
 * @method string|null getReportColorValue()
 * @method string|null getReportId()
 * @method string|null getRoundingDifference()
 * @method string|null getTaxBasicRate()
 * @method string|null getTaxBasicRateHc()
 * @method string|null getTaxReducedRate1()
 * @method string|null getTaxReducedRate1Hc()
 * @method string|null getTaxReducedRate2()
 * @method string|null getTaxReducedRate2Hc()
 * @method string|null getTotalBasicRate()
 * @method string|null getTotalBasicRateHc()
 * @method string|null getTotalReducedRate1()
 * @method string|null getTotalReducedRate1Hc()
 * @method string|null getTotalReducedRate2()
 * @method string|null getTotalReducedRate2Hc()
 * @method string|null getTotalVat()
 * @method string|null getTotalVatHc()
 * @method string|null getTotalWithoutVat()
 * @method string|null getTotalWithoutVatHc()
 * @method string|null getTotalWithVat()
 * @method string|null getTotalWithVatHc()
 * @method string|null getVariableSymbol()
 * @method string|null getVatOnPayStatus()
 * @method string|null getVatRateBasic()
 * @method string|null getVatRateReduced1()
 * @method string|null getVatRateReduced2()
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
    public $Links;
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

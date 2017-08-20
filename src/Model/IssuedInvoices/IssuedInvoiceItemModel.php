<?php

namespace Fousky\Component\iDoklad\Model\IssuedInvoices;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method string|null getAccountNumber()
 * @method string|null getBankId()
 * @method string|null getBankName()
 * @method string|null getBankNumberCode()
 * @method string|null getConstantSymbolId()
 * @method string|null getCurrencyId()
 * @method string|\DateTime getDateOfIssue()
 * @method string|\DateTime getDateOfMaturity()
 * @method string|\DateTime getDateOfPayment()
 * @method string|\DateTime getDateOfTaxing()
 * @method string|\DateTime getDateOfVatApplication()
 * @method string|null getDescription()
 * @method string|null getDiscountPercentage()
 * @method string|null getDocumentNumber()
 * @method string|null getDocumentSerialNumber()
 * @method string|null getEetResponsibility()
 * @method string|null getExchangeRate()
 * @method string|null getExchangeRateAmount()
 * @method string|null getIban()
 * @method string|null getIsEet()
 * @method string|null getIssuedInvoiceItems()
 * @method string|null getItemsTextPrefix()
 * @method string|null getItemsTextSuffix()
 * @method string|null getLanguageCode()
 * @method string|null getNote()
 * @method string|null getNumericSequenceId()
 * @method string|null getOrderNumber()
 * @method string|null getPaymentOptionId()
 * @method string|null getPurchaserId()
 * @method string|null getReportColorValue()
 * @method string|null getSalesPosEquipmentId()
 * @method string|null getSwift()
 * @method string|null getVariableSymbol()
 * @method string|null getVatOnPayStatus()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class IssuedInvoiceItemModel extends iDokladAbstractModel
{
    public $AccountNumber;
    public $BankId;
    public $BankName;
    public $BankNumberCode;
    public $ConstantSymbolId;
    public $CurrencyId;
    public $DateOfIssue;
    public $DateOfMaturity;
    public $DateOfPayment;
    public $DateOfTaxing;
    public $DateOfVatApplication;
    public $Description;
    public $DiscountPercentage;
    public $DocumentNumber;
    public $DocumentSerialNumber;
    public $EetResponsibility;
    public $ExchangeRate;
    public $ExchangeRateAmount;
    public $Iban;
    public $IsEet;
    public $IssuedInvoiceItems;
    public $ItemsTextPrefix;
    public $ItemsTextSuffix;
    public $LanguageCode;
    public $Note;
    public $NumericSequenceId;
    public $OrderNumber;
    public $PaymentOptionId;
    public $PurchaserId;
    public $ReportColorValue;
    public $SalesPosEquipmentId;
    public $Swift;
    public $VariableSymbol;
    public $VatOnPayStatus;

    /**
     * @return array
     */
    public static function getDateTimeProperties(): array
    {
        return [
            'DateOfIssue',
            'DateOfMaturity',
            'DateOfPayment',
            'DateOfTaxing',
            'DateOfVatApplication',
        ];
    }
}

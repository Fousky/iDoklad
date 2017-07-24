<?php

namespace Fousky\Component\iDoklad\Model\ProformaInvoices;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|string getAccountNumber()
 * @method null|string getBankId()
 * @method null|string getBankName()
 * @method null|string getBankNumberCode()
 * @method null|string getConstantSymbolId()
 * @method null|string getCurrencyId()
 * @method null|string getDateOfIssue()
 * @method null|string getDateOfMaturity()
 * @method null|string getDateOfPayment()
 * @method null|string getDateOfTaxing()
 * @method null|string getDescription()
 * @method null|string getDiscountPercentage()
 * @method null|string getDocumentNumber()
 * @method null|string getDocumentSerialNumber()
 * @method null|string getEetResponsibility()
 * @method null|string getExchangeRate()
 * @method null|string getExchangeRateAmount()
 * @method null|string getIban()
 * @method null|string getIsEet()
 * @method null|string getIsProformaTaxed()
 * @method null|string getItemsTextPrefix()
 * @method null|string getItemsTextSuffix()
 * @method null|string getLanguageCode()
 * @method null|string getNote()
 * @method null|string getOrderNumber()
 * @method null|string getPaymentOptionId()
 * @method null|string getProformaInvoiceItems()
 * @method null|string getPurchaserId()
 * @method null|string getReportColorValue()
 * @method null|string getSalesPosEquipmentId()
 * @method null|string getSwift()
 * @method null|string getVariableSymbol()
 *
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
class ProformaInvoiceModel extends iDokladAbstractModel
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
    public $Description;
    public $DiscountPercentage;
    public $DocumentNumber;
    public $DocumentSerialNumber;
    public $EetResponsibility;
    public $ExchangeRate;
    public $ExchangeRateAmount;
    public $Iban;
    public $IsEet;
    public $IsProformaTaxed;
    public $ItemsTextPrefix;
    public $ItemsTextSuffix;
    public $LanguageCode;
    public $Note;
    public $OrderNumber;
    public $PaymentOptionId;
    /** @var ProformaInvoiceItemModel[] */
    public $ProformaInvoiceItems;
    public $PurchaserId;
    public $ReportColorValue;
    public $SalesPosEquipmentId;
    public $Swift;
    public $VariableSymbol;
}

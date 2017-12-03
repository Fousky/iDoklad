<?php

namespace Fousky\Component\iDoklad\Model\ProformaInvoices;

use Fousky\Component\iDoklad\LOV\VatOnPayStatusEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\IssuedInvoices\IssuedInvoiceItemApiModelUpdate;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @method null|string getAccountNumber()
 * @method null|int getBankId()
 * @method null|string getBankName()
 * @method null|string getBankNumberCode()
 * @method null|int getConstantSymbolId()
 * @method null|int getCurrencyId()
 * @method null|\DateTime getDateOfIssue()
 * @method null|\DateTime getDateOfMaturity()
 * @method null|\DateTime getDateOfPayment()
 * @method null|string getDescription()
 * @method null|float getExchangeRate()
 * @method null|float getExchangeRateAmount()
 * @method null|string getIban()
 * @method null|bool getIsProformaTaxed()
 * @method null|string getItemsTextPrefix()
 * @method null|string getItemsTextSuffix()
 * @method null|string getLanguageCode()
 * @method null|string getNote()
 * @method null|string getOrderNumber()
 * @method null|int getPaymentOptionId()
 * @method null|IssuedInvoiceItemApiModelUpdate[] getProformaInvoiceItems()
 * @method null|int getPurchaserId()
 * @method null|string getReportColorValue()
 * @method null|string getSwift()
 * @method null|string getVariableSymbol()
 * @method null|VatOnPayStatusEnum getVatOnPayStatus()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ProformaInvoicePutModelV2 extends iDokladAbstractModel
{
    /** @Assert\Type(type="string") */
    public $AccountNumber;

    /** @Assert\Type(type="int") */
    public $BankId;

    /** @Assert\Type(type="string") */
    public $BankName;

    /** @Assert\Type(type="string") */
    public $BankNumberCode;

    /** @Assert\Type(type="int") */
    public $ConstantSymbolId;

    /** @Assert\Type(type="int") */
    public $CurrencyId;

    /** @Assert\DateTime() */
    public $DateOfIssue;

    /** @Assert\DateTime() */
    public $DateOfMaturity;

    /** @Assert\DateTime() */
    public $DateOfPayment;

    /** @Assert\Type(type="string") */
    public $Description;

    /** @Assert\Type(type="float") */
    public $ExchangeRate;

    /** @Assert\Type(type="float") */
    public $ExchangeRateAmount;

    /** @Assert\Type(type="string") */
    public $Iban;

    /** @Assert\Type(type="bool") */
    public $IsProformaTaxed;

    /** @Assert\Type(type="string") */
    public $ItemsTextPrefix;

    /** @Assert\Type(type="string") */
    public $ItemsTextSuffix;

    /** @Assert\Type(type="string") */
    public $LanguageCode;

    /** @Assert\Type(type="string") */
    public $Note;

    /** @Assert\Type(type="string") */
    public $OrderNumber;

    /** @Assert\Type(type="int") */
    public $PaymentOptionId;

    /**
     * @var IssuedInvoiceItemApiModelUpdate[]
     *
     * @Assert\Valid(traverse=true)
     * @Assert\All(constraints={
     *     @Assert\Type(type="Fousky\Component\iDoklad\Model\IssuedInvoices\IssuedInvoiceItemApiModelUpdate"),
     * })
     */
    public $ProformaInvoiceItems;

    /** @Assert\Type(type="int") */
    public $PurchaserId;

    /** @Assert\Type(type="string") */
    public $ReportColorValue;

    /** @Assert\Type(type="string") */
    public $Swift;

    /** @Assert\Type(type="string") */
    public $VariableSymbol;

    /** @Assert\Type(type="Fousky\Component\iDoklad\LOV\VatOnPayStatusEnum") */
    public $VatOnPayStatus;

    /**
     * @return array
     */
    public static function getDateMap(): array
    {
        return [
            'DateOfIssue',
            'DateOfMaturity',
            'DateOfPayment',
        ];
    }

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'ProformaInvoiceItems' => IssuedInvoiceItemApiModelUpdate::class,
        ];
    }

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'VatOnPayStatus' => VatOnPayStatusEnum::class,
        ];
    }
}

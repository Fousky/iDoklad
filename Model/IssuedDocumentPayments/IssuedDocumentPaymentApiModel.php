<?php

namespace Fousky\Component\iDoklad\Model\IssuedDocumentPayments;

use Fousky\Component\iDoklad\LOV\EetResponsibilityEnum;
use Fousky\Component\iDoklad\LOV\ExportedStateEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\RegisteredSale\RegisteredSaleApiModel;

/**
 * @method null|int getCurrencyId()
 * @method null|\DateTime getDateCreated()
 * @method null|\DateTime getDateLastChange()
 * @method null|\DateTime getDateOfPayment()
 * @method null|\DateTime getDateOfVatApplication()
 * @method null|EetResponsibilityEnum getEetResponsibility()
 * @method null|float getExchangeRate()
 * @method null|float getExchangeRateAmount()
 * @method null|ExportedStateEnum getExported()
 * @method null|int getId()
 * @method null|int getInvoiceId()
 * @method null|bool getIsEet()
 * @method null|float getPaymentAmount()
 * @method null|float getPaymentAmountHc()
 * @method null|int getPaymentOptionId()
 * @method null|RegisteredSaleApiModel getRegisteredSale()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class IssuedDocumentPaymentApiModel extends iDokladAbstractModel
{
    public $CurrencyId;
    public $DateCreated;
    public $DateLastChange;
    public $DateOfPayment;
    public $DateOfVatApplication;
    public $EetResponsibility;
    public $ExchangeRate;
    public $ExchangeRateAmount;
    public $Exported;
    public $Id;
    public $InvoiceId;
    public $IsEet;
    public $PaymentAmount;
    public $PaymentAmountHc;
    public $PaymentOptionId;
    public $RegisteredSale;

    /**
     * @return array
     */
    public static function getDateMap(): array
    {
        return [
            'DateCreated',
            'DateLastChange',
            'DateOfPayment',
            'DateOfVatApplication',
        ];
    }

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
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
            'Exported'          => ExportedStateEnum::class,
        ];
    }
}

<?php

namespace Fousky\Component\iDoklad\Model\ReceivedDocumentPayments;

use Fousky\Component\iDoklad\LOV\ExportedStateEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|int getCurrencyId()
 * @method null|\DateTime getDateCreated()
 * @method null|\DateTime getDateLastChange()
 * @method null|\DateTime getDateOfPayment()
 * @method null|\DateTime getDateOfVatApplication()
 * @method null|float getExchangeRate()
 * @method null|float getExchangeRateAmount()
 * @method null|ExportedStateEnum getExported()
 * @method null|int getId()
 * @method null|int getInvoiceId()
 * @method null|float getPaymentAmount()
 * @method null|float getPaymentAmountHc()
 * @method null|int getPaymentOptionId()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ReceivedDocumentPaymentApiModel extends iDokladAbstractModel
{
    public $CurrencyId;

    public $DateCreated;

    public $DateLastChange;

    public $DateOfPayment;

    public $DateOfVatApplication;

    public $ExchangeRate;

    public $ExchangeRateAmount;

    public $Exported;

    public $Id;

    public $InvoiceId;

    public $PaymentAmount;

    public $PaymentAmountHc;

    public $PaymentOptionId;

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'Exported' => ExportedStateEnum::class,
        ];
    }
}

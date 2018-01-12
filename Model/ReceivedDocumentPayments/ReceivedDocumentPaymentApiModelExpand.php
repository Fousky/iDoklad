<?php

namespace Fousky\Component\iDoklad\Model\ReceivedDocumentPayments;

use Fousky\Component\iDoklad\Model\Currencies\CurrencyApiModel;
use Fousky\Component\iDoklad\Model\PaymentOptions\PaymentOptionApiModel;
use Fousky\Component\iDoklad\Model\ReceivedInvoices\ReceivedInvoiceApiModel;

/**
 * @method null|CurrencyApiModel getCurrency()
 * @method null|PaymentOptionApiModel getPaymentOption()
 * @method null|ReceivedInvoiceApiModel getReceivedInvoice()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ReceivedDocumentPaymentApiModelExpand extends ReceivedDocumentPaymentApiModel
{
    public $Currency;

    public $PaymentOption;

    public $ReceivedInvoice;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'Currency' => CurrencyApiModel::class,
            'PaymentOption' => PaymentOptionApiModel::class,
            'ReceivedInvoice' => ReceivedInvoiceApiModel::class,
        ];
    }
}

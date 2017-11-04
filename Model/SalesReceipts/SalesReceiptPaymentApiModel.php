<?php

namespace Fousky\Component\iDoklad\Model\SalesReceipts;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|int getId()
 * @method null|float getPaymentAmount()
 * @method null|int getPaymentOptionId()
 * @method null|string getPaymentTransactionCode()
 * @method null|int getSalesReceiptId()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class SalesReceiptPaymentApiModel extends iDokladAbstractModel
{
    public $Id;
    public $PaymentAmount;
    public $PaymentOptionId;
    public $PaymentTransactionCode;
    public $SalesReceiptId;
}

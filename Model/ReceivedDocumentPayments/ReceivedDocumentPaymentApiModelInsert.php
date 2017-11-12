<?php

namespace Fousky\Component\iDoklad\Model\ReceivedDocumentPayments;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @method null|\DateTime getDateOfPayment()
 * @method null|\DateTime getDateOfVatApplication()
 * @method null|int getInvoiceId()
 * @method null|float getPaymentAmount()
 * @method null|int getPaymentOptionId()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ReceivedDocumentPaymentApiModelInsert extends iDokladAbstractModel
{
    /** @Assert\DateTime() */
    public $DateOfPayment;

    /** @Assert\DateTime() */
    public $DateOfVatApplication;

    /**
     * @var int
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="int")
     */
    public $InvoiceId;

    /** @Assert\Type(type="float") */
    public $PaymentAmount;

    /** @Assert\Type(type="int") */
    public $PaymentOptionId;

    /**
     * @return array
     */
    public static function getDateMap(): array
    {
        return [
            'DateOfPayment',
            'DateOfVatApplication',
        ];
    }
}

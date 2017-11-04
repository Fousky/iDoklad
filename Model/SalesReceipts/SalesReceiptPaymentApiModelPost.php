<?php

namespace Fousky\Component\iDoklad\Model\SalesReceipts;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/ResourceModel?modelName=SalesReceiptPaymentApiModelPost
 *
 * @method null|float getPaymentAmount()
 * @method null|int getPaymentOptionId()
 * @method null|string getPaymentTransactionCode()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class SalesReceiptPaymentApiModelPost extends iDokladAbstractModel
{
    public $PaymentAmount;

    /**
     * @Assert\NotBlank()
     * @Assert\GreaterThan(value="0")
     */
    public $PaymentOptionId;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min="0", max="20")
     */
    public $PaymentTransactionCode;

    /**
     * @param array $properties
     */
    public function __construct(array $properties = [])
    {
        $this->processProperties($properties);
    }
}

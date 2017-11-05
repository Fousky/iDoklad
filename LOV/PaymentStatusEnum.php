<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/ResourceModel?modelName=PaymentStatusEnum
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class PaymentStatusEnum extends iDokladAbstractEnum
{
    const UNPAID = 0;
    const PAID = 1;
    const PARTIAL_PAID = 2;
    const OVERPAID = 3;

    /**
     * @return bool
     */
    public function isUnpaid(): bool
    {
        return $this->getValue() === self::UNPAID;
    }

    /**
     * @return bool
     */
    public function isPaid(): bool
    {
        return $this->getValue() === self::PAID;
    }

    /**
     * @return bool
     */
    public function isPartialPaid(): bool
    {
        return $this->getValue() === self::PARTIAL_PAID;
    }

    /**
     * @return bool
     */
    public function isOverpaid(): bool
    {
        return $this->getValue() === self::OVERPAID;
    }
}

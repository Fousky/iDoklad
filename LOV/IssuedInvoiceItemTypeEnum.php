<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/ResourceModel?modelName=IssuedInvoiceItemTypeEnum
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class IssuedInvoiceItemTypeEnum extends iDokladAbstractEnum
{
    const TYPE_NORMAL = 0;
    const TYPE_ROUND = 1;
    const TYPE_REDUCED = 2;
    const TYPE_DISCOUNT = 3;

    /**
     * @return bool
     */
    public function isTypeNormal(): bool
    {
        return $this->getValue() === self::TYPE_NORMAL;
    }

    /**
     * @return bool
     */
    public function isTypeRound(): bool
    {
        return $this->getValue() === self::TYPE_ROUND;
    }

    /**
     * @return bool
     */
    public function isTypeReduced(): bool
    {
        return $this->getValue() === self::TYPE_REDUCED;
    }

    /**
     * @return bool
     */
    public function isTypeDiscount(): bool
    {
        return $this->getValue() === self::TYPE_DISCOUNT;
    }
}

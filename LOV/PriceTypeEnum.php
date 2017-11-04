<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/ResourceModel?modelName=PriceTypeEnum
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class PriceTypeEnum extends iDokladAbstractEnum
{
    const WITH_VAT = 0;
    const WITHOUT_VAT = 1;
    const ONLY_BASE = 2;

    /**
     * @return bool
     */
    public function isWithVat(): bool
    {
        return $this->getValue() === self::WITH_VAT;
    }

    /**
     * @return bool
     */
    public function isWithoutVat(): bool
    {
        return $this->getValue() === self::WITHOUT_VAT;
    }

    /**
     * @return bool
     */
    public function isOnlyBase(): bool
    {
        return $this->getValue() === self::ONLY_BASE;
    }
}

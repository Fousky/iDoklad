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
        return self::WITH_VAT === $this->getValue();
    }

    /**
     * @return bool
     */
    public function isWithoutVat(): bool
    {
        return self::WITHOUT_VAT === $this->getValue();
    }

    /**
     * @return bool
     */
    public function isOnlyBase(): bool
    {
        return self::ONLY_BASE === $this->getValue();
    }
}

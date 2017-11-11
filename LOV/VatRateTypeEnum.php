<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class VatRateTypeEnum extends iDokladAbstractEnum
{
    const REDUCED1 = 0;
    const BASIC = 1;
    const ZERO = 2;
    const REDUCED2 = 3;

    /**
     * @return bool
     */
    public function isReduced1(): bool
    {
        return self::REDUCED1 === $this->value;
    }

    /**
     * @return bool
     */
    public function isBasic(): bool
    {
        return self::BASIC === $this->value;
    }

    /**
     * @return bool
     */
    public function isZero(): bool
    {
        return self::ZERO === $this->value;
    }

    /**
     * @return bool
     */
    public function isReduced2(): bool
    {
        return self::REDUCED2 === $this->value;
    }
}

<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class VatRateTypeEnum
{
    const REDUCED1 = 0;
    const BASIC = 1;
    const ZERO = 2;
    const REDUCED2 = 3;

    /**
     * @var int
     */
    protected $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return bool
     */
    public function isReduced1(): bool
    {
        return $this->value === self::REDUCED1;
    }

    /**
     * @return bool
     */
    public function isBasic(): bool
    {
        return $this->value === self::BASIC;
    }

    /**
     * @return bool
     */
    public function isZero(): bool
    {
        return $this->value === self::ZERO;
    }

    /**
     * @return bool
     */
    public function isReduced2(): bool
    {
        return $this->value === self::REDUCED2;
    }
}

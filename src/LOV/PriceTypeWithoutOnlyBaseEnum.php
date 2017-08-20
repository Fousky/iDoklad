<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class PriceTypeWithoutOnlyBaseEnum
{
    const WITH_VAT = 0;
    const WITHOUT_VAT = 1;

    /** @var int $value */
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
    public function isWithVat(): bool
    {
        return $this->value === self::WITH_VAT;
    }

    /**
     * @return bool
     */
    public function isWithoutVat(): bool
    {
        return $this->value === self::WITHOUT_VAT;
    }
}

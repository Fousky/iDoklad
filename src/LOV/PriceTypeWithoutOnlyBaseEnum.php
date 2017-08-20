<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class PriceTypeWithoutOnlyBaseEnum extends iDokladAbstractEnum
{
    const WITH_VAT = 0;
    const WITHOUT_VAT = 1;

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

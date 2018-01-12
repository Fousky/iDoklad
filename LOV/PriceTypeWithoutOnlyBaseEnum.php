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
        return self::WITH_VAT === $this->value;
    }

    /**
     * @return bool
     */
    public function isWithoutVat(): bool
    {
        return self::WITHOUT_VAT === $this->value;
    }
}

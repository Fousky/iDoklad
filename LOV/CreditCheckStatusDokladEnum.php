<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CreditCheckStatusDokladEnum extends iDokladAbstractEnum
{
    const NOT_FOUND = 0;
    const OK = 1;
    const OK_WITH_WARNINGS = 2;
    const RISK = 3;
    const NOT_VERIFIED = 4;

    /**
     * @return bool
     */
    public function isNotFound(): bool
    {
        return $this->value === self::NOT_FOUND;
    }

    /**
     * @return bool
     */
    public function isOk(): bool
    {
        return $this->value === self::OK;
    }

    /**
     * @return bool
     */
    public function isOkWithWarnings(): bool
    {
        return $this->value === self::OK_WITH_WARNINGS;
    }

    /**
     * @return bool
     */
    public function isRisk(): bool
    {
        return $this->value === self::RISK;
    }

    /**
     * @return bool
     */
    public function isNotVerified(): bool
    {
        return $this->value === self::NOT_VERIFIED;
    }
}

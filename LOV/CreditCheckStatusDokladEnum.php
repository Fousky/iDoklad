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
        return self::NOT_FOUND === $this->value;
    }

    /**
     * @return bool
     */
    public function isOk(): bool
    {
        return self::OK === $this->value;
    }

    /**
     * @return bool
     */
    public function isOkWithWarnings(): bool
    {
        return self::OK_WITH_WARNINGS === $this->value;
    }

    /**
     * @return bool
     */
    public function isRisk(): bool
    {
        return self::RISK === $this->value;
    }

    /**
     * @return bool
     */
    public function isNotVerified(): bool
    {
        return self::NOT_VERIFIED === $this->value;
    }
}

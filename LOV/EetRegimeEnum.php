<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class EetRegimeEnum extends iDokladAbstractEnum
{
    const NONE = 0;

    const ORDINARY = 1;

    const SIMPLIFIED = 2;

    /**
     * @return bool
     */
    public function isNone(): bool
    {
        return self::NONE === $this->value;
    }

    /**
     * @return bool
     */
    public function isOrdinary(): bool
    {
        return self::ORDINARY === $this->value;
    }

    /**
     * @return bool
     */
    public function isSimplified(): bool
    {
        return self::SIMPLIFIED === $this->value;
    }
}

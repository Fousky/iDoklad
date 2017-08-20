<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class EetRegimeEnum
{
    const NONE = 0;
    const ORDINARY = 1;
    const SIMPLIFIED = 2;

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
    public function isNone(): bool
    {
        return $this->value === self::NONE;
    }

    /**
     * @return bool
     */
    public function isOrdinary(): bool
    {
        return $this->value === self::ORDINARY;
    }

    /**
     * @return bool
     */
    public function isSimplified(): bool
    {
        return $this->value === self::SIMPLIFIED;
    }
}

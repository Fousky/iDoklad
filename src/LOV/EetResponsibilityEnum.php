<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class EetResponsibilityEnum
{
    const IDOKLAD = 0;
    const EXTERNAL_APPLICATION = 1;

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
    public function isIDoklad(): bool
    {
        return $this->value === self::IDOKLAD;
    }

    /**
     * @return bool
     */
    public function isExternalApplication(): bool
    {
        return $this->value === self::EXTERNAL_APPLICATION;
    }
}

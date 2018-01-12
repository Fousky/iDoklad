<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class EetResponsibilityEnum extends iDokladAbstractEnum
{
    const IDOKLAD = 0;

    const EXTERNAL_APPLICATION = 1;

    /**
     * @return bool
     */
    public function isIDoklad(): bool
    {
        return self::IDOKLAD === $this->value;
    }

    /**
     * @return bool
     */
    public function isExternalApplication(): bool
    {
        return self::EXTERNAL_APPLICATION === $this->value;
    }
}

<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class RegisteredSaleStateEnum extends iDokladAbstractEnum
{
    const NEW = 0;
    const REGISTERED = 1;
    const ERROR = -1;

    /**
     * @return bool
     */
    public function isNew(): bool
    {
        return $this->value === self::NEW;
    }

    /**
     * @return bool
     */
    public function isRegistered(): bool
    {
        return $this->value === self::REGISTERED;
    }

    /**
     * @return bool
     */
    public function isError(): bool
    {
        return $this->value === self::ERROR;
    }
}

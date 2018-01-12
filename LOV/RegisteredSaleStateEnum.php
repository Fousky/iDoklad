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
        return self::NEW === $this->value;
    }

    /**
     * @return bool
     */
    public function isRegistered(): bool
    {
        return self::REGISTERED === $this->value;
    }

    /**
     * @return bool
     */
    public function isError(): bool
    {
        return self::ERROR === $this->value;
    }
}

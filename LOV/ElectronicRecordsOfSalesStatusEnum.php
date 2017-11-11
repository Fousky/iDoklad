<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ElectronicRecordsOfSalesStatusEnum extends iDokladAbstractEnum
{
    const NOT_REGISTERED = 1;
    const REGISTERED = 2;

    /**
     * @return bool
     */
    public function isNotRegistered(): bool
    {
        return self::NOT_REGISTERED === $this->value;
    }

    /**
     * @return bool
     */
    public function isRegistered(): bool
    {
        return self::REGISTERED === $this->value;
    }
}

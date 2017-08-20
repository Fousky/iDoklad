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
        return $this->value === self::NOT_REGISTERED;
    }

    /**
     * @return bool
     */
    public function isRegistered(): bool
    {
        return $this->value === self::REGISTERED;
    }
}

<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class InvoiceTypeEnum extends iDokladAbstractEnum
{
    const NONE = -1;
    const ISSUED = 0;
    const RECEIVED = 1;

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
    public function isIssued(): bool
    {
        return $this->value === self::ISSUED;
    }

    /**
     * @return bool
     */
    public function isReceived(): bool
    {
        return $this->value === self::RECEIVED;
    }
}

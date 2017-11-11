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
        return self::NONE === $this->value;
    }

    /**
     * @return bool
     */
    public function isIssued(): bool
    {
        return self::ISSUED === $this->value;
    }

    /**
     * @return bool
     */
    public function isReceived(): bool
    {
        return self::RECEIVED === $this->value;
    }
}

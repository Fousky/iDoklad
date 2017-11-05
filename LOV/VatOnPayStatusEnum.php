<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/ResourceModel?modelName=VatOnPayStatusEnum
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class VatOnPayStatusEnum extends iDokladAbstractEnum
{
    const DISABLED = 0;
    const ENABLED = 1;
    const INVOICE_NEEDS_TAXING = 2;

    /**
     * @return bool
     */
    public function isDisabled(): bool
    {
        return $this->getValue() === self::DISABLED;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->getValue() === self::ENABLED;
    }

    /**
     * @return bool
     */
    public function isInvoiceNeedsTaxing(): bool
    {
        return $this->getValue() === self::INVOICE_NEEDS_TAXING;
    }
}

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
        return self::DISABLED === $this->getValue();
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return self::ENABLED === $this->getValue();
    }

    /**
     * @return bool
     */
    public function isInvoiceNeedsTaxing(): bool
    {
        return self::INVOICE_NEEDS_TAXING === $this->getValue();
    }
}

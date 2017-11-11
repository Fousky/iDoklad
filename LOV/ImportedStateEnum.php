<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/ResourceModel?modelName=ImportedStateEnum
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ImportedStateEnum extends iDokladAbstractEnum
{
    const NOT_IMPORTED = 0;
    const IMPORTED = 1;

    /**
     * @return bool
     */
    public function isNotImported(): bool
    {
        return self::NOT_IMPORTED === $this->getValue();
    }

    /**
     * @return bool
     */
    public function isImported(): bool
    {
        return self::IMPORTED === $this->getValue();
    }
}

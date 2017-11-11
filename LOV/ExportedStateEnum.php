<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ExportedStateEnum extends iDokladAbstractEnum
{
    const NOT_EXPORTED = 0;
    const EXPORTED = 1;
    const CHANGED = 2;
    const DELETED = 3;

    /**
     * @return bool
     */
    public function isNotExported(): bool
    {
        return self::NOT_EXPORTED === $this->value;
    }

    /**
     * @return bool
     */
    public function isExported(): bool
    {
        return self::EXPORTED === $this->value;
    }

    /**
     * @return bool
     */
    public function isChanged(): bool
    {
        return self::CHANGED === $this->value;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return self::DELETED === $this->value;
    }
}

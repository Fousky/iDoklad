<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ExportedStateEnum
{
    const NOT_EXPORTED = 0;
    const EXPORTED = 1;
    const CHANGED = 2;
    const DELETED = 3;

    /** @var int $value */
    protected $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return bool
     */
    public function isNotExported(): bool
    {
        return $this->value === self::NOT_EXPORTED;
    }

    /**
     * @return bool
     */
    public function isExported(): bool
    {
        return $this->value === self::EXPORTED;
    }

    /**
     * @return bool
     */
    public function isChanged(): bool
    {
        return $this->value === self::CHANGED;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->value === self::DELETED;
    }
}

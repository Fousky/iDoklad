<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class MovementTypeEnum
{
    const ENTRY = 1;    // příjem
    const ISSUE = -1;   // výdaj

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
    public function isEntry(): bool
    {
        return $this->value === self::ENTRY;
    }

    /**
     * @return bool
     */
    public function isIssue(): bool
    {
        return $this->value === self::ISSUE;
    }
}

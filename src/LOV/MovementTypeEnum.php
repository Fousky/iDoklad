<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class MovementTypeEnum extends iDokladAbstractEnum
{
    const ENTRY = 1;    // příjem
    const ISSUE = -1;   // výdaj

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

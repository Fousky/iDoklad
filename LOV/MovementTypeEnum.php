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
     * Příjem?
     *
     * @return bool
     */
    public function isEntry(): bool
    {
        return self::ENTRY === $this->value;
    }

    /**
     * Výdaj?
     *
     * @return bool
     */
    public function isIssue(): bool
    {
        return self::ISSUE === $this->value;
    }
}

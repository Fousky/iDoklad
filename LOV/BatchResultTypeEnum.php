<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class BatchResultTypeEnum extends iDokladAbstractEnum
{
    const SUCCESS = 0;
    const PARTIAL_SUCCESS = 1;
    const FAILURE = 2;

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return self::SUCCESS === $this->getValue();
    }

    /**
     * @return bool
     */
    public function isPartialSuccess(): bool
    {
        return self::PARTIAL_SUCCESS === $this->getValue();
    }

    /**
     * @return bool
     */
    public function isFailure(): bool
    {
        return self::FAILURE === $this->getValue();
    }
}

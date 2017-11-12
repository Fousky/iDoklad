<?php

namespace Fousky\Component\iDoklad\Functions\PaymentOptions;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=GET-api-v2-PaymentOptions-GetChanges_lastCheck
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetChangedPaymentOptions extends GetPaymentOptions
{
    /** @var \DateTime $lastCheckedAt */
    protected $lastCheckedAt;

    /**
     * @param \DateTime $lastCheckedAt
     */
    public function __construct(\DateTime $lastCheckedAt)
    {
        $this->lastCheckedAt = $lastCheckedAt;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return sprintf(
            'PaymentOptions/GetChanges?lastCheck=%s',
            $this->lastCheckedAt->format('Y-m-d H:i:s')
        );
    }
}

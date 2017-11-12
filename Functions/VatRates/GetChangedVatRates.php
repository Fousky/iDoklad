<?php

namespace Fousky\Component\iDoklad\Functions\VatRates;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\VatRates\VatRateApiCollectionModel;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=GET-api-v2-VatRates-GetChanges_lastCheck
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetChangedVatRates extends iDokladAbstractFunction
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
     * Get iDokladModelInterface class.
     *
     * @see iDokladModelInterface
     *
     * @return string
     */
    public function getModelClass(): string
    {
        return VatRateApiCollectionModel::class;
    }

    /**
     * GET|POST|PUT|DELETE e.g.
     *
     * @see iDoklad::request()
     *
     * @return string
     */
    public function getHttpMethod(): string
    {
        return 'GET';
    }

    /**
     * Return base URI, e.g. /invoices; /invoice/1/edit and so on.
     *
     * @see iDoklad::call()
     *
     * @return string
     */
    public function getUri(): string
    {
        return sprintf(
            'VatRates/GetChanges?lastCheck=%s',
            $this->lastCheckedAt->format('Y-m-d H:i:s')
        );
    }

    /**
     * Vrátí seznam parametrů, které se předají GuzzleHttp\Client.
     *
     * @see \GuzzleHttp\Client::request()
     * @see iDoklad::call()
     *
     * @return array
     */
    public function getGuzzleOptions(): array
    {
        return [];
    }
}

<?php

namespace Fousky\Component\iDoklad\Functions\PriceListItems;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\PriceListItems\BatchModelOfInt32;
use Fousky\Component\iDoklad\Model\PriceListItems\BatchResultOfInt32;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=DELETE-api-v2-PriceListItems-Batch-deleteIfReferenced
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class DeletePriceListItemsBatch extends iDokladAbstractFunction
{
    /** @var BatchModelOfInt32 $data */
    protected $data;

    /** @var bool $deleteIfReferenced */
    protected $deleteIfReferenced;

    /**
     * @param BatchModelOfInt32 $data
     * @param bool              $deleteIfReferenced
     *
     * @throws \Fousky\Component\iDoklad\Exception\InvalidModelException
     */
    public function __construct(BatchModelOfInt32 $data, bool $deleteIfReferenced = true)
    {
        $this->data = $data;
        $this->deleteIfReferenced = $deleteIfReferenced;

        $this->validate($data);
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
        return BatchResultOfInt32::class;
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
        return 'DELETE';
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
            'PriceListItems/Batch/%s',
            true === $this->deleteIfReferenced ? 1 : 0
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

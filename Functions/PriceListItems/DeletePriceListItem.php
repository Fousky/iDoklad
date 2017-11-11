<?php

namespace Fousky\Component\iDoklad\Functions\PriceListItems;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\Void\VoidModel;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=DELETE-api-v2-PriceListItems-id-deleteIfReferenced
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class DeletePriceListItem extends iDokladAbstractFunction
{
    /** @var string $id */
    protected $id;

    /** @var bool $deleteIfReferenced */
    protected $deleteIfReferenced;

    /**
     * @param string $id
     * @param bool   $deleteIfReferenced
     */
    public function __construct(string $id, bool $deleteIfReferenced = true)
    {
        $this->id = $id;
        $this->deleteIfReferenced = $deleteIfReferenced;
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
        return VoidModel::class;
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
            'PriceListItems/%s/%s',
            $this->id,
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

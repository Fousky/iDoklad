<?php

namespace Fousky\Component\iDoklad\Functions\PriceListItems;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\PriceListItems\PriceListApiModel;
use Fousky\Component\iDoklad\Model\PriceListItems\PriceListPatchModel;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=PATCH-api-v2-PriceListItems-id
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class PatchPriceListItem extends iDokladAbstractFunction
{
    /** @var string $id */
    protected $id;

    /** @var PriceListPatchModel $data */
    protected $data;

    /**
     * @param string              $id
     * @param PriceListPatchModel $data
     *
     * @throws \Fousky\Component\iDoklad\Exception\InvalidModelException
     */
    public function __construct(string $id, PriceListPatchModel $data)
    {
        $this->id = $id;
        $this->data = $data;

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
        return PriceListApiModel::class;
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
        return 'PATCH';
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
        return sprintf('PriceListItems/%s', $this->id);
    }

    /**
     * Vrátí seznam parametrů, které se předají GuzzleHttp\Client.
     *
     * @see \GuzzleHttp\Client::request()
     * @see iDoklad::call()
     *
     * @return array
     *
     * @throws \ReflectionException
     * @throws \InvalidArgumentException
     */
    public function getGuzzleOptions(): array
    {
        return [
            'json' => $this->data->toArray([
                iDokladAbstractModel::TOARRAY_REMOVE_NULLS => true,
            ]),
        ];
    }
}

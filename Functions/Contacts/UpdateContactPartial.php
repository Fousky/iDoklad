<?php

namespace Fousky\Component\iDoklad\Functions\Contacts;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\Contacts\ContactApiModel;
use Fousky\Component\iDoklad\Model\Contacts\ContactPatchApiModel;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=PATCH-api-v2-Contacts-id
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class UpdateContactPartial extends iDokladAbstractFunction
{
    /** @var string $id */
    protected $id;

    /** @var ContactPatchApiModel $data */
    protected $data;

    /**
     * @param string $id
     * @param ContactPatchApiModel $data
     *
     * @throws \Fousky\Component\iDoklad\Exception\InvalidModelException
     */
    public function __construct(string $id, ContactPatchApiModel $data)
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
        return ContactApiModel::class;
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
        return sprintf('Contacts/%s', $this->id);
    }

    /**
     * Vrátí seznam parametrů, které se předají GuzzleHttp\Client.
     *
     * @see \GuzzleHttp\Client::request()
     * @see iDoklad::call()
     *
     * @return array
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

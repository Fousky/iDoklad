<?php

namespace Fousky\Component\iDoklad\Functions\Contacts;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\Contacts\ContactCollectionModel;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=GET-api-v2-Contacts
 *
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
class GetContacts extends iDokladAbstractFunction
{
    /**
     * @return string
     */
    public function getModelClass(): string
    {
        return ContactCollectionModel::class;
    }

    /**
     * GET|POST|PUT|DELETE e.g.
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
     * @return string
     */
    public function getUri(): string
    {
        return 'Contacts';
    }

    /**
     * @return array
     */
    public function getGuzzleOptions(): array
    {
        return [];
    }
}

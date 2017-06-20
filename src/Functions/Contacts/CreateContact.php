<?php

namespace Fousky\Component\iDoklad\Functions\Contacts;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\Contacts\ContactModel;

/**
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
class CreateContact extends iDokladAbstractFunction
{
    /** @var ContactModel $subject */
    protected $subject;

    /**
     * @param ContactModel $subject
     */
    public function __construct(ContactModel $subject)
    {
        $this->subject = $subject;
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
        return ContactModel::class;
    }

    /**
     * GET|POST|PUT|DELETE e.g.
     *
     * @see iDokladApiCaller::request()
     *
     * @return string
     */
    public function getHttpMethod(): string
    {
        return 'POST';
    }

    /**
     * Return base URI, e.g. /invoices; /invoice/1/edit and so on.
     *
     * @see iDokladApiClient::call()
     *
     * @return string
     */
    public function getUri(): string
    {
        return 'Contacts';
    }

    /**
     * Vrátí seznam parametrů, které se předají GuzzleHttp\Client
     *
     * @see \GuzzleHttp\Client::request()
     * @see iDokladApiClient::call()
     *
     * @return array
     * @throws \ReflectionException
     * @throws \InvalidArgumentException
     */
    public function getGuzzleOptions(): array
    {
        $params = [
            'json' => $this->subject->toArray(),
        ];

        dump($params);
        die;

        return $params;
    }
}

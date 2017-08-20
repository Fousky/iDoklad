<?php

namespace Fousky\Component\iDoklad\Functions\Auth;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\Auth\AccessToken;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetAccessToken extends iDokladAbstractFunction
{
    /**
     * @return string
     */
    public function getModelClass(): string
    {
        return AccessToken::class;
    }

    /**
     * GET|POST|PUT|DELETE e.g.
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
     * @return string
     */
    public function getUri(): string
    {
        return $this->config['token_endpoint'];
    }

    /**
     * Vrátí seznam parametrů, které se předají do HTTP klienta.
     *
     * @see iDoklad::request()
     *
     * @return array
     */
    public function getGuzzleOptions(): array
    {
        return [
            'form_params' => [
                'scope'         => $this->config['scope'],
                'grant_type'    => 'client_credentials',
                'client_id'     => $this->config['client_id'],
                'client_secret' => $this->config['client_secret'],
            ],
        ];
    }

    /**
     * @return bool
     */
    public function injectAccessTokenToHeaders(): bool
    {
        return false;
    }
}

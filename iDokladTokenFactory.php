<?php

namespace Fousky\Component\iDoklad;

use Fousky\Component\iDoklad\Exception\InvalidTokenException;
use Fousky\Component\iDoklad\Model\Auth\AccessToken;
use Fousky\Component\iDoklad\Storage\AccessTokenStorageInterface;
use Fousky\Component\iDoklad\Storage\AccessTokenVoidStorage;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class iDokladTokenFactory
{
    /** @var AccessTokenStorageInterface $storage */
    protected $storage;

    /**
     * @param AccessTokenStorageInterface $storage
     */
    public function __construct(AccessTokenStorageInterface $storage = null)
    {
        if (null === $storage) {
            $storage = new AccessTokenVoidStorage();
        }

        $this->storage = $storage;
    }

    /**
     * @param Client $client
     * @param array  $config
     *
     * @throws \RuntimeException
     * @throws Exception\TokenNotFoundException
     * @throws InvalidTokenException
     *
     * @return AccessToken
     */
    public function getToken(Client $client, array $config): AccessToken
    {
        if ($this->storage->hasToken() && !$this->storage->isTokenExpired()) {
            return $this->storage->getToken();
        }

        return $this->createToken($client, $config);
    }

    /**
     * @param Client $client
     * @param array  $config
     *
     * @throws \RuntimeException
     * @throws InvalidTokenException
     *
     * @return AccessToken
     */
    protected function createToken(Client $client, array $config): AccessToken
    {
        return $this->extractToken(
            $client->request('POST', $config['token_endpoint'], [
                'form_params' => [
                    'scope' => $config['scope'],
                    'grant_type' => 'client_credentials',
                    'client_id' => $config['client_id'],
                    'client_secret' => $config['client_secret'],
                ],
                'debug' => (bool) $config['debug'],
            ]),
            new \DateTime()
        );
    }

    /**
     * @param ResponseInterface $response
     * @param \DateTime         $requestedAt
     *
     * @throws \RuntimeException
     * @throws InvalidTokenException
     *
     * @return AccessToken
     */
    protected function extractToken(ResponseInterface $response, \DateTime $requestedAt): AccessToken
    {
        if (200 !== $response->getStatusCode()) {
            throw new InvalidTokenException($response, 'ERR_IDOKLAD___INVALID_TOKEN_CALL');
        }

        $content = \GuzzleHttp\json_decode($response->getBody()->getContents());
        $content = (array) $content;

        if (!is_array($content) ||
            !array_key_exists('access_token', $content) ||
            !array_key_exists('expires_in', $content) ||
            !array_key_exists('token_type', $content)
        ) {
            throw new InvalidTokenException($response, 'ERR_IDOKLAD___INVALID_TOKEN_RESPONSE');
        }

        $token = new AccessToken(
            (string) $content['access_token'],
            (int) $content['expires_in'],
            (string) $content['token_type'],
            $requestedAt
        );

        $this->storage->setToken($token);

        return $token;
    }
}

<?php

namespace Fousky\Component\iDoklad;

use Fousky\Component\iDoklad\Exception\TokenNotFoundException;
use Fousky\Component\iDoklad\Exception\InvalidTokenException;
use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\Auth\AccessToken;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\Exception\ExceptionInterface;

/**
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
class iDokladApiCaller
{
    /** @var array $config */
    protected $config;

    /** @var iDokladApiHelper $helper */
    protected $helper;

    /** @var Client $client */
    protected $client;

    /**
     * @param array $config
     * @param iDokladApiHelper $helper
     *
     * @throws ExceptionInterface
     */
    public function __construct(array $config, iDokladApiHelper $helper)
    {
        $this->config = $this->configureOptions($config);
        $this->helper = $helper;
        $this->client = new Client([
            'base_uri' => $this->config['url'],
        ]);
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $options
     * @param bool $injectToken
     *
     * @return ResponseInterface
     * @throws \Exception
     */
    public function request($method, $uri, array $options = [], $injectToken = true): ResponseInterface
    {
        $defaults = [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ];

        if ($injectToken === true) {
            $token = $this->getToken();

            $defaults = array_merge_recursive($defaults, [
                'headers' => [
                    'Authorization' => sprintf(
                        '%s %s',
                        $token->getType(),
                        $token->getToken()
                    ),
                ],
            ]);
        }

        return $this->client->request($method, $uri, array_merge_recursive($options, $defaults));
    }

    /**
     * @return AccessToken
     *
     * @throws \RuntimeException
     * @throws TokenNotFoundException
     * @throws InvalidTokenException
     */
    public function getToken(): AccessToken
    {
        return $this->helper->getToken($this->client, $this->config);
    }

    /**
     * @param array $options
     * @return array
     * @throws ExceptionInterface
     */
    protected function configureOptions(array $options): array
    {
        return iDokladAbstractFunction::assertConfiguration($options);
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }
}

<?php

namespace Fousky\Component\iDoklad;

use Fousky\Component\iDoklad\Exception\InvalidTokenException;
use Fousky\Component\iDoklad\Exception\TokenNotFoundException;
use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Functions\iDokladFunctionInterface;
use Fousky\Component\iDoklad\Model\Auth\AccessToken;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
use GuzzleHttp\Client;
use Symfony\Component\OptionsResolver\Exception\ExceptionInterface;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class iDoklad
{
    /** @var array $config */
    protected $config;

    /** @var iDokladTokenFactory $helper */
    protected $helper;

    /** @var iDokladTokenFactory $tokenFactory */
    protected $tokenFactory;

    /** @var Client $client */
    protected $client;

    /**
     * @param array               $config
     * @param iDokladTokenFactory $tokenFactory
     *
     * @throws ExceptionInterface
     */
    public function __construct(array $config, iDokladTokenFactory $tokenFactory)
    {
        $this->config = $this->assertConfiguration($config);
        $this->tokenFactory = $tokenFactory;
        $this->client = new Client([
            'base_uri' => $this->config['url'],
        ]);
    }

    /**
     * @param iDokladFunctionInterface $function
     *
     * @throws \Exception
     *
     * @return iDokladModelInterface
     */
    public function execute(iDokladFunctionInterface $function): iDokladModelInterface
    {
        return $function
            ->setConfig($this->getConfig())
            ->handleResponse(
                $this->client->request(
                    $function->getHttpMethod(),
                    $this->resolveUri($function),
                    $this->resolveOptions($function)
                )
            );
    }

    /**
     * @param iDokladFunctionInterface $function
     *
     * @return string
     */
    protected function resolveUri(iDokladFunctionInterface $function): string
    {
        $uri = $function->getUri();

        $parts = [];

        if ($function->hasSortable()) {
            $parts = array_merge_recursive($parts, $function->getSortable()->getHttpQuery());
        }

        if ($function->hasPaginator()) {
            $parts = array_merge_recursive($parts, $function->getPaginator()->getHttpQuery());
        }

        if ($function->hasFilter()) {
            $parts = array_merge_recursive($parts, $function->getFilter()->getHttpQuery());
        }

        if (count($parts) > 0) {
            // URI does not have "?"
            if (strpos($uri, '?') === false) {
                $uri .= '?';
            }
            // URI has "?", but does not ends with "&"
            if (strpos($uri, '?') !== false && substr($uri, -1) !== '&') {
                $uri .= '&';
            }
            $uri .= http_build_query($parts);
        }

        return $uri;
    }

    /**
     * @param iDokladFunctionInterface $function
     *
     * @throws InvalidTokenException
     * @throws TokenNotFoundException
     *
     * @return array
     */
    protected function resolveOptions(iDokladFunctionInterface $function): array
    {
        $defaults = [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ];

        if ($function->injectAccessTokenToHeaders()) {
            $token = $this->getToken();

            $defaults = array_merge_recursive(
                $defaults,
                [
                    'headers' => [
                        'Authorization' => sprintf(
                            '%s %s',
                            $token->getType(),
                            $token->getToken()
                        ),
                    ],
                ]
            );
        }

        return array_merge_recursive($function->getGuzzleOptions(), $defaults);
    }

    /**
     * @throws \RuntimeException
     * @throws TokenNotFoundException
     * @throws InvalidTokenException
     *
     * @return AccessToken
     */
    public function getToken(): AccessToken
    {
        return $this->tokenFactory->getToken($this->client, $this->config);
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array $config
     *
     * @throws ExceptionInterface
     *
     * @return array
     */
    protected function assertConfiguration(array $config): array
    {
        return iDokladAbstractFunction::assertConfiguration($config);
    }
}

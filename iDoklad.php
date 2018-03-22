<?php

namespace Fousky\Component\iDoklad;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Functions\iDokladFunctionInterface;
use Fousky\Component\iDoklad\Model\Auth\AccessToken;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class iDoklad
{
    /** @var array */
    protected $config;

    /** @var iDokladTokenFactory */
    protected $helper;

    /** @var iDokladTokenFactory */
    protected $tokenFactory;

    /** @var Client */
    protected $client;

    public function __construct(array $config, iDokladTokenFactory $tokenFactory)
    {
        $this->config = $this->assertConfiguration($config);
        $this->tokenFactory = $tokenFactory;
        $this->client = new Client([
            'base_uri' => $this->config['url'],
        ]);
    }

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
            if (false === strpos($uri, '?')) {
                $uri .= '?';
            }
            // URI has "?", but does not ends with "&"
            $lastChar = substr($uri, -1);
            if (false !== strpos($uri, '?') && !in_array($lastChar, ['&', '?'], true)) {
                $uri .= '&';
            }
            $uri .= http_build_query($parts);
        }

        return $uri;
    }

    protected function resolveOptions(iDokladFunctionInterface $function): array
    {
        $defaults = [
            RequestOptions::HEADERS => [
                'Accept' => 'application/json',
                'Accept-Language' => $this->config['language'],
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

    public function getToken(): AccessToken
    {
        return $this->tokenFactory->getToken($this->client, $this->config);
    }

    public function getConfig(): array
    {
        return $this->config;
    }

    protected function assertConfiguration(array $config): array
    {
        return iDokladAbstractFunction::assertConfiguration($config);
    }
}

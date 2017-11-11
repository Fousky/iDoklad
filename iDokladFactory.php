<?php

namespace Fousky\Component\iDoklad;

use Fousky\Component\iDoklad\Storage\AccessTokenStorageInterface;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class iDokladFactory
{
    /**
     * @param array                            $config
     * @param AccessTokenStorageInterface|null $storage
     *
     * @throws \Symfony\Component\OptionsResolver\Exception\ExceptionInterface
     *
     * @return iDoklad
     */
    public static function create(array $config, AccessTokenStorageInterface $storage = null): iDoklad
    {
        return new iDoklad(
            $config,
            new iDokladTokenFactory($storage)
        );
    }

    /**
     * Get all required options for $config.
     *
     * @return array
     */
    public static function getRequiredOptions(): array
    {
        return [
            'client_id' => [
                'info' => 'Client ID from iDoklad admin.',
                'types' => ['string'],
            ],
            'client_secret' => [
                'info' => 'Client secret from iDoklad admin.',
                'types' => ['string'],
            ],
        ];
    }

    /**
     * Get all available options for $config.
     *
     * @return array
     */
    public static function getAvailableOptions(): array
    {
        return [
            'debug' => [
                'info' => 'If true, then GuzzleHttp will be in verbose mode.',
                'types' => ['boolean'],
            ],
            'url' => [
                'info' => 'iDoklad API base URL',
                'types' => ['string'],
            ],
            'token_endpoint' => [
                'info' => 'iDoklad Access Token URL',
                'types' => ['string'],
            ],
            'client_id' => [
                'info' => 'Client ID from iDoklad admin.',
                'types' => ['string'],
            ],
            'client_secret' => [
                'info' => 'Client secret from iDoklad admin.',
                'types' => ['string'],
            ],
            'scope' => [
                'info' => 'iDoklad scope configuration.',
                'types' => ['string'],
            ],
        ];
    }
}

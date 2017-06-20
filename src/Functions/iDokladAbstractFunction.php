<?php

namespace Fousky\Component\iDoklad\Functions;

use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\Exception\ExceptionInterface;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;

/**
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
abstract class iDokladAbstractFunction implements iDokladFunctionInterface
{
    /** @var ResponseInterface|null $response */
    protected $response;

    /** @var array $config */
    protected $config;

    /**
     * @return bool
     */
    public function injectAccessTokenToHeaders(): bool
    {
        return true;
    }

    /**
     * Handle response from iDoklad and create model instance.
     *
     * @param ResponseInterface $response
     *
     * @return iDokladModelInterface
     * @throws \InvalidArgumentException
     * @throws \Fousky\Component\iDoklad\Exception\InvalidResponseException
     * @throws \ReflectionException
     */
    public function handleResponse(ResponseInterface $response): iDokladModelInterface
    {
        return $this->createModel($this->getModelClass(), $response);
    }

    /**
     * @param string|iDokladModelInterface $modelClass
     * @param ResponseInterface $response
     *
     * @return iDokladModelInterface
     * @throws \ReflectionException
     * @throws \InvalidArgumentException
     * @throws \Fousky\Component\iDoklad\Exception\InvalidResponseException
     */
    protected function createModel($modelClass, ResponseInterface $response): iDokladModelInterface
    {
        if (!class_exists($modelClass) ||
            !(new \ReflectionClass($modelClass))->implementsInterface(iDokladModelInterface::class)
        ) {
            throw new \InvalidArgumentException(sprintf(
                'Class %s not exists or does not implements interface %s',
                $modelClass,
                iDokladModelInterface::class
            ));
        }

        return $modelClass::createFromResponse($response);
    }

    /**
     * @param array $config
     * @return array
     * @throws ExceptionInterface
     */
    public static function assertConfiguration(array $config): array
    {
        return (new OptionsResolver())
            ->setRequired([
                'debug',
                'url',
                'client_id',
                'client_secret',
                'token_endpoint',
                'scope',
            ])
            ->setAllowedTypes('debug', ['boolean'])
            ->setAllowedTypes('url', ['string'])
            ->setAllowedTypes('client_id', ['string'])
            ->setAllowedTypes('client_secret', ['string'])
            ->setAllowedTypes('token_endpoint', ['string'])
            ->setAllowedTypes('scope', ['string'])
            ->resolve($config)
        ;
    }

    /**
     * @param array $config
     *
     * @return iDokladFunctionInterface
     */
    public function setConfig(array $config): iDokladFunctionInterface
    {
        $this->config = $config;

        return $this;
    }
}

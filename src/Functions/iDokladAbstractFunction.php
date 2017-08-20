<?php

namespace Fousky\Component\iDoklad\Functions;

use Fousky\Component\iDoklad\UrlExtension\iDokladFilter;
use Fousky\Component\iDoklad\UrlExtension\iDokladPaginator;
use Fousky\Component\iDoklad\UrlExtension\iDokladSortable;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\Exception\ExceptionInterface;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
abstract class iDokladAbstractFunction implements iDokladFunctionInterface
{
    /** @var ResponseInterface|null $response */
    protected $response;

    /** @var array $config */
    protected $config;

    /** @var iDokladFilter $filter */
    protected $filter;

    /** @var iDokladPaginator $paginator */
    protected $paginator;

    /** @var iDokladSortable $sortable */
    protected $sortable;

    /**
     * @param iDokladPaginator $paginator
     *
     * @return iDokladAbstractFunction
     */
    public function paginator(iDokladPaginator $paginator): iDokladAbstractFunction
    {
        $this->setPaginator($paginator);

        return $this;
    }

    /**
     * @param iDokladSortable $sortable
     *
     * @return iDokladAbstractFunction
     */
    public function sortable(iDokladSortable $sortable): iDokladAbstractFunction
    {
        $this->setSortable($sortable);

        return $this;
    }

    /**
     * @param iDokladFilter $filter
     *
     * @return $this
     */
    public function filter(iDokladFilter $filter)
    {
        $this->setFilter($filter);

        return $this;
    }

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
            ->setDefaults([
                'debug' => false,
                'url' => 'https://app.idoklad.cz/developer/api/v2/',
                'token_endpoint' => 'https://app.idoklad.cz/identity/server/connect/token',
                'scope' => 'idoklad_api',
            ])
            ->setRequired([
                'client_id',
                'client_secret',
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

    /**
     * @return bool
     */
    public function hasSortable(): bool
    {
        return $this->sortable !== null;
    }

    /**
     * @return iDokladSortable
     * @throws \RuntimeException
     */
    public function getSortable(): iDokladSortable
    {
        if (!$this->hasSortable()) {
            throw new \RuntimeException(sprintf(
                'Function %s does not have iDokladSortable instance.',
                __CLASS__
            ));
        }

        return $this->sortable;
    }

    /**
     * @param null|iDokladSortable $sortable
     */
    public function setSortable(iDokladSortable $sortable = null)
    {
        $this->sortable = $sortable;
    }

    /**
     * @return bool
     */
    public function hasPaginator(): bool
    {
        return $this->paginator !== null;
    }

    /**
     * @return iDokladPaginator
     * @throws \RuntimeException
     */
    public function getPaginator(): iDokladPaginator
    {
        if (!$this->hasPaginator()) {
            throw new \RuntimeException(sprintf(
                'Function %s does not have iDokladPaginator instance.',
                __CLASS__
            ));
        }

        return $this->paginator;
    }

    /**
     * @param null|iDokladPaginator $paginator
     */
    public function setPaginator(iDokladPaginator $paginator = null)
    {
        $this->paginator = $paginator;
    }

    /**
     * @return bool
     */
    public function hasFilter(): bool
    {
        return $this->filter !== null;
    }

    /**
     * @return iDokladFilter
     * @throws \RuntimeException
     */
    public function getFilter(): iDokladFilter
    {
        if (!$this->hasFilter()) {
            throw new \RuntimeException(sprintf(
                'Function %s does not have iDokladFilter instance.',
                __CLASS__
            ));
        }

        return $this->filter;
    }

    /**
     * @param null|iDokladFilter $filter
     */
    public function setFilter(iDokladFilter $filter = null)
    {
        $this->filter = $filter;
    }
}

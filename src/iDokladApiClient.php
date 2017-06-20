<?php

namespace Fousky\Component\iDoklad;

use Fousky\Component\iDoklad\Functions\iDokladFunctionInterface;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;

/**
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
class iDokladApiClient
{
    /** @var iDokladApiCaller $caller */
    protected $caller;

    /**
     * @param iDokladApiCaller $caller
     */
    public function __construct(iDokladApiCaller $caller)
    {
        $this->caller = $caller;
    }

    /**
     * @param iDokladFunctionInterface $function
     * @return iDokladModelInterface
     * @throws \Exception
     */
    public function call(iDokladFunctionInterface $function): iDokladModelInterface
    {
        return $function
            ->setConfig($this->caller->getConfig())
            ->handleResponse(
                $this->caller->request(
                    $function->getHttpMethod(),
                    $function->getUri(),
                    $function->getGuzzleOptions(),
                    $function->injectAccessTokenToHeaders()
                )
            )
        ;
    }
}

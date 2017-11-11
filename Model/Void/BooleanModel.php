<?php

namespace Fousky\Component\iDoklad\Model\Void;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class BooleanModel extends iDokladAbstractModel
{
    /** @var bool $result */
    protected $result;

    /**
     * @param ResponseInterface $response
     *
     * @return iDokladModelInterface
     */
    public static function createFromResponse(ResponseInterface $response): iDokladModelInterface
    {
        $model = new static();
        $model->result = (bool) $response->getBody()->getContents();

        return $model;
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return true === $this->result;
    }
}

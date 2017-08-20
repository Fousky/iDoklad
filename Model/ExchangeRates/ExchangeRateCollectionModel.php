<?php

namespace Fousky\Component\iDoklad\Model\ExchangeRates;

use Doctrine\Common\Collections\ArrayCollection;
use Fousky\Component\iDoklad\Exception\InvalidResponseException;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
use Fousky\Component\iDoklad\Util\ResponseUtil;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ExchangeRateCollectionModel extends iDokladAbstractModel
{
    protected $Data;
    protected $TotalItems = 0;
    protected $TotalPages = 0;


    /**
     * @param ResponseInterface $response
     *
     * @return iDokladModelInterface
     *
     * @throws \RuntimeException
     * @throws InvalidResponseException
     */
    public static function createFromResponse(ResponseInterface $response): iDokladModelInterface
    {
        $responseData = (array) ResponseUtil::handle($response);

        if (!array_key_exists('Data', $responseData)) {
            throw new InvalidResponseException();
        }

        $model = new static();
        $items = new ArrayCollection();

        foreach ($responseData['Data'] as $index => $single) {
            $items->add(ExchangeRateModel::createFromStd($single));
        }

        $model->Data = $items;
        $model->TotalPages = $responseData['TotalPages'];
        $model->TotalItems = $responseData['TotalItems'];

        return $model;
    }
}

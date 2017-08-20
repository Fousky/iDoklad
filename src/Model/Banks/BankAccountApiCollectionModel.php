<?php

namespace Fousky\Component\iDoklad\Model\Banks;

use Doctrine\Common\Collections\ArrayCollection;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @method null|ArrayCollection|BankAccountApiModel[] getBankAccounts()
 *
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
class BankAccountApiCollectionModel extends iDokladAbstractModel
{
    /** @var null|ArrayCollection|BankAccountApiModel[] $BankAccounts */
    protected $BankAccounts;

    /**
     * @param ResponseInterface $response
     *
     * @return iDokladModelInterface
     */
    public static function createFromResponse(ResponseInterface $response): iDokladModelInterface
    {
        /** @var \stdClass[] $items */
        $items = \GuzzleHttp\json_decode($response->getBody()->getContents());

        $model = new static();
        $model->BankAccounts = static::createCollection($items);

        return $model;
    }

    /**
     * @param array $items
     *
     * @return BankAccountApiCollectionModel
     */
    public static function createFromArray(array $items): BankAccountApiCollectionModel
    {
        $model = new static();
        $model->BankAccounts = static::createCollection($items);

        return $model;
    }

    /**
     * @param array|\stdClass[] $items
     *
     * @return ArrayCollection
     */
    protected static function createCollection(array $items): ArrayCollection
    {
        $collection = new ArrayCollection();

        foreach ($items as $item) {
            $collection->add(BankAccountApiModel::createFromStd($item));
        }

        return $collection;
    }
}

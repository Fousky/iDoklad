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

        $collection = new ArrayCollection();

        foreach ($items as $item) {
            $collection->add(BankAccountApiModel::createFromStd($item));
        }

        $model = new static();
        $model->BankAccounts = $collection;

        return $model;
    }
}

<?php

namespace Fousky\Component\iDoklad\Model\Agendas;

use Doctrine\Common\Collections\ArrayCollection;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @method null|ArrayCollection|SummaryQuarterModel[] getQuarters()
 *
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
class SummaryQuarterCollectionModel extends iDokladAbstractModel
{
    /** @var ArrayCollection|SummaryQuarterModel[] $quarters */
    protected $quarters;

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
            $collection->add(SummaryQuarterModel::createFromStd($item));
        }

        $model = new static();
        $model->quarters = $collection;

        return $model;
    }
}

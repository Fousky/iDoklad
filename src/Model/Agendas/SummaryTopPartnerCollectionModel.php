<?php

namespace Fousky\Component\iDoklad\Model\Agendas;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Doctrine\Common\Collections\ArrayCollection;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @method ArrayCollection|SummaryTopPartnerModel[] getPartners()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class SummaryTopPartnerCollectionModel extends iDokladAbstractModel
{
    /** @var ArrayCollection|SummaryTopPartnerModel[] $partners */
    public $partners;

    /**
     * @param ResponseInterface $response
     *
     * @return iDokladModelInterface
     */
    public static function createFromResponse(ResponseInterface $response): iDokladModelInterface
    {
        /** @var \stdClass[] $content */
        $content = \GuzzleHttp\json_decode($response->getBody()->getContents());

        $result = new ArrayCollection();

        foreach ($content as $item) {
            $result->add(SummaryTopPartnerModel::createFromStd($item));
        }

        $model = new static();
        $model->partners = $result;

        return $model;
    }
}

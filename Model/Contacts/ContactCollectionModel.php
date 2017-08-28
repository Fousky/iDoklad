<?php

namespace Fousky\Component\iDoklad\Model\Contacts;

use Doctrine\Common\Collections\ArrayCollection;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ContactCollectionModel extends iDokladAbstractModel
{
    /** @var ContactApiModel[]|ArrayCollection $Data */
    protected $Data;

    /** @var int $TotalItems */
    protected $TotalItems = 0;

    /** @var int $TotalPages */
    protected $TotalPages = 0;

    /**
     * @param \stdClass $data
     *
     * @return iDokladModelInterface
     */
    public static function createFromStd(\stdClass $data): iDokladModelInterface
    {
        /** @var static $model */
        $model = parent::createFromStd($data);

        if (is_array($model->Data)) {
            $collection = new ArrayCollection();
            foreach ($model->Data as $index => $contact) {
                $collection->add(ContactApiModel::createFromStd($contact));
            }
            $model->Data = $collection;
        }

        return $model;
    }
}

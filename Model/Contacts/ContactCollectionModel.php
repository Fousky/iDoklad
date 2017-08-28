<?php

namespace Fousky\Component\iDoklad\Model\Contacts;

use Doctrine\Common\Collections\ArrayCollection;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

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
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'Data' => ContactApiModel::class,
        ];
    }
}

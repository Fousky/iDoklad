<?php

namespace Fousky\Component\iDoklad\Model\Banks;

use Doctrine\Common\Collections\ArrayCollection;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method BankApiModel[]|ArrayCollection getData()
 * @method int getTotalItems()
 * @method int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class BankCollectionModel extends iDokladAbstractModel
{
    /** @var BankApiModel[] */
    public $Data;
    public $TotalItems;
    public $TotalPages;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'Data' => BankApiModel::class,
        ];
    }
}

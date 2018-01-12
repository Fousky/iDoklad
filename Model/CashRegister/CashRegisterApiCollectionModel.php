<?php

namespace Fousky\Component\iDoklad\Model\CashRegister;

use Doctrine\Common\Collections\ArrayCollection;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|ArrayCollection|CashRegisterApiModel[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CashRegisterApiCollectionModel extends iDokladAbstractModel
{
    public $Data;

    public $TotalItems;

    public $TotalPages;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'Data' => CashRegisterApiModel::class,
        ];
    }
}

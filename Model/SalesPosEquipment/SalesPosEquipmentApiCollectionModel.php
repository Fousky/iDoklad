<?php

namespace Fousky\Component\iDoklad\Model\SalesPosEquipment;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|SalesPosEquipmentApiModel[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class SalesPosEquipmentApiCollectionModel extends iDokladAbstractModel
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
            'Data' => SalesPosEquipmentApiModel::class,
        ];
    }
}

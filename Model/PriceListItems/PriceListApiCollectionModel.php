<?php

namespace Fousky\Component\iDoklad\Model\PriceListItems;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|PriceListApiModel[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class PriceListApiCollectionModel extends iDokladAbstractModel
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
            'Data' => PriceListApiModel::class,
        ];
    }
}

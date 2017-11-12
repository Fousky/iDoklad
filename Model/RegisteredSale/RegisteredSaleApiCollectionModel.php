<?php

namespace Fousky\Component\iDoklad\Model\RegisteredSale;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|RegisteredSaleApiModel[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class RegisteredSaleApiCollectionModel extends iDokladAbstractModel
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
            'Data' => RegisteredSaleApiModel::class,
        ];
    }
}

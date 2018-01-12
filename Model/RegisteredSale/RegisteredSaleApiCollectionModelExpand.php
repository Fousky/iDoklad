<?php

namespace Fousky\Component\iDoklad\Model\RegisteredSale;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|RegisteredSaleApiModelExpand[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class RegisteredSaleApiCollectionModelExpand extends iDokladAbstractModel
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
            'Data' => RegisteredSaleApiModelExpand::class,
        ];
    }
}

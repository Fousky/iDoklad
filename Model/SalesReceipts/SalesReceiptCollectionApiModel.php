<?php

namespace Fousky\Component\iDoklad\Model\SalesReceipts;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|SalesReceiptApiModel[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class SalesReceiptCollectionApiModel extends iDokladAbstractModel
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
            'Data' => SalesReceiptApiModel::class,
        ];
    }
}

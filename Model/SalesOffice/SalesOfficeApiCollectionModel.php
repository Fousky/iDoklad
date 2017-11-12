<?php

namespace Fousky\Component\iDoklad\Model\SalesOffice;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|SalesOfficeApiModel[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class SalesOfficeApiCollectionModel extends iDokladAbstractModel
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
            'Data' => SalesOfficeApiModel::class,
        ];
    }
}

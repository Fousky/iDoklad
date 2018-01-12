<?php

namespace Fousky\Component\iDoklad\Model\VatRates;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|VatRateApiModel[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class VatRateApiCollectionModel extends iDokladAbstractModel
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
            'Data' => VatRateApiModel::class,
        ];
    }
}

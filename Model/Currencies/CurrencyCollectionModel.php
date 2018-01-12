<?php

namespace Fousky\Component\iDoklad\Model\Currencies;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CurrencyCollectionModel extends iDokladAbstractModel
{
    protected $Data;

    protected $TotalItems;

    protected $TotalPages;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'Data' => CurrencyApiModel::class,
        ];
    }
}

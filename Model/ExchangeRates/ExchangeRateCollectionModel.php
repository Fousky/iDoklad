<?php

namespace Fousky\Component\iDoklad\Model\ExchangeRates;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ExchangeRateCollectionModel extends iDokladAbstractModel
{
    protected $Data;
    protected $TotalItems = 0;
    protected $TotalPages = 0;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'Data' => ExchangeRateModel::class,
        ];
    }
}

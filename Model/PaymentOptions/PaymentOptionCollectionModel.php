<?php

namespace Fousky\Component\iDoklad\Model\PaymentOptions;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class PaymentOptionCollectionModel extends iDokladAbstractModel
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
            'Data' => PaymentOptionModel::class,
        ];
    }
}

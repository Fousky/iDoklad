<?php

namespace Fousky\Component\iDoklad\Model\PaymentOptions;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|PaymentOptionApiModel[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class PaymentOptionApiCollectionModel extends iDokladAbstractModel
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
            'Data' => PaymentOptionApiModel::class,
        ];
    }
}

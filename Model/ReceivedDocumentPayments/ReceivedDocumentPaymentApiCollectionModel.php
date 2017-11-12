<?php

namespace Fousky\Component\iDoklad\Model\ReceivedDocumentPayments;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|ReceivedDocumentPaymentApiModel[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ReceivedDocumentPaymentApiCollectionModel extends iDokladAbstractModel
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
            'Data' => ReceivedDocumentPaymentApiModel::class,
        ];
    }
}

<?php

namespace Fousky\Component\iDoklad\Model\IssuedDocumentPayments;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|IssuedDocumentPaymentApiModel[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class IssuedDocumentPaymentApiCollectionModel extends iDokladAbstractModel
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
            'Data' => IssuedDocumentPaymentApiModel::class,
        ];
    }
}

<?php

namespace Fousky\Component\iDoklad\Model\ReceivedInvoices;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|ReceivedInvoiceApiModel[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Jan Gula
 */
class ReceivedInvoiceApiCollectionModel extends iDokladAbstractModel
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
            'Data' => ReceivedInvoiceApiModel::class,
        ];
    }
}

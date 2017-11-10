<?php

namespace Fousky\Component\iDoklad\Model\IssuedInvoices;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|IssuedInvoiceApiModel[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class IssuedInvoiceApiCollectionModel extends iDokladAbstractModel
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
            'Data' => IssuedInvoiceApiModel::class,
        ];
    }
}

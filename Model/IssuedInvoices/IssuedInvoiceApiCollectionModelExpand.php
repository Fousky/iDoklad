<?php

namespace Fousky\Component\iDoklad\Model\IssuedInvoices;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|IssuedInvoiceApiModelExpand[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class IssuedInvoiceApiCollectionModelExpand extends iDokladAbstractModel
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
            'Data' => IssuedInvoiceApiModelExpand::class,
        ];
    }
}

<?php

namespace Fousky\Component\iDoklad\Model\ProformaInvoices;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|ProformaInvoiceApiModelExpand[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ProformaInvoiceApiCollectionModelExpand extends iDokladAbstractModel
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
            'Data' => ProformaInvoiceApiModelExpand::class,
        ];
    }
}

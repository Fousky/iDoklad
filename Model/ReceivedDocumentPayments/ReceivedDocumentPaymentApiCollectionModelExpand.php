<?php

namespace Fousky\Component\iDoklad\Model\ReceivedDocumentPayments;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|ReceivedDocumentPaymentApiModelExpand[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ReceivedDocumentPaymentApiCollectionModelExpand extends iDokladAbstractModel
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
            'Data' => ReceivedDocumentPaymentApiModelExpand::class,
        ];
    }
}

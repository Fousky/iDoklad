<?php

namespace Fousky\Component\iDoklad\Model\CreditNotes;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|CreditNoteApiModel[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CreditNoteApiCollectionModel extends iDokladAbstractModel
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
            'Data' => CreditNoteApiModel::class,
        ];
    }
}

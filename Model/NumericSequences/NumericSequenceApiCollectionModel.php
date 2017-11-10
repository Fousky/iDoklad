<?php

namespace Fousky\Component\iDoklad\Model\NumericSequences;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|NumericSequenceApiModel[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class NumericSequenceApiCollectionModel extends iDokladAbstractModel
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
            'Data' => NumericSequenceApiModel::class,
        ];
    }
}

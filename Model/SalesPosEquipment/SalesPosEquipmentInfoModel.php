<?php

namespace Fousky\Component\iDoklad\Model\SalesPosEquipment;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\NumericSequences\NumericSequenceApiModel;

/**
 * @method null|string getDesignation()
 * @method null|int getId()
 * @method null|string getName()
 * @method null|NumericSequenceApiModel getNumericSequence()
 * @method null|int getSalesOfficeId()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class SalesPosEquipmentInfoModel extends iDokladAbstractModel
{
    public $Designation;
    public $Id;
    public $Name;
    public $NumericSequence;
    public $SalesOfficeId;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'NumericSequence' => NumericSequenceApiModel::class,
        ];
    }
}

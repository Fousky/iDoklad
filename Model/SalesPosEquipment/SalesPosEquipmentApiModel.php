<?php

namespace Fousky\Component\iDoklad\Model\SalesPosEquipment;

use Fousky\Component\iDoklad\LOV\SalesPosEquipmentTypeEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|int getCashRegisterId()
 * @method null|string getDesignation()
 * @method null|int getId()
 * @method null|bool getIsRegisteredEet()
 * @method null|string getName()
 * @method null|int getSalesOfficeId()
 * @method null|SalesPosEquipmentTypeEnum getSalesPosEquipmentType()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class SalesPosEquipmentApiModel extends iDokladAbstractModel
{
    public $CashRegisterId;
    public $Designation;
    public $Id;
    public $IsRegisteredEet;
    public $Name;
    public $SalesOfficeId;
    public $SalesPosEquipmentType;

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'SalesPosEquipmentType' => SalesPosEquipmentTypeEnum::class,
        ];
    }
}

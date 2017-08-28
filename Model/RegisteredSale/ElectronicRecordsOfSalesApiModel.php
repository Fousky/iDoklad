<?php

namespace Fousky\Component\iDoklad\Model\RegisteredSale;

use Fousky\Component\iDoklad\LOV\EetResponsibilityEnum;
use Fousky\Component\iDoklad\LOV\ElectronicRecordsOfSalesStatusEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|EetResponsibilityEnum getEetResponsibility()
 * @method null|ElectronicRecordsOfSalesStatusEnum getEetStatus()
 * @method null|bool getIsEet()
 * @method null|RegisteredSaleInformationApiModel getRegisteredSale()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ElectronicRecordsOfSalesApiModel extends iDokladAbstractModel
{
    public $EetResponsibility;
    public $EetStatus;
    public $IsEet;
    public $RegisteredSale;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'RegisteredSale' => RegisteredSaleInformationApiModel::class,
        ];
    }

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'EetResponsibility' => EetResponsibilityEnum::class,
            'EetStatus'         => ElectronicRecordsOfSalesStatusEnum::class,
        ];
    }
}

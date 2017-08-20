<?php

namespace Fousky\Component\iDoklad\Model\RegisteredSale;

use Fousky\Component\iDoklad\LOV\EetResponsibilityEnum;
use Fousky\Component\iDoklad\LOV\ElectronicRecordsOfSalesStatusEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;

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
     * @param \stdClass $data
     *
     * @return iDokladModelInterface
     */
    public static function createFromStd(\stdClass $data): iDokladModelInterface
    {
        /** @var ElectronicRecordsOfSalesApiModel $model */
        $model = parent::createFromStd($data);

        if ($model->EetResponsibility !== null) {
            $model->EetResponsibility = new EetResponsibilityEnum((int) $model->EetResponsibility);
        }

        if ($model->EetStatus !== null) {
            $model->EetStatus = new ElectronicRecordsOfSalesStatusEnum((int) $model->EetStatus);
        }

        if ($model->RegisteredSale instanceof \stdClass) {
            $model->RegisteredSale = RegisteredSaleInformationApiModel::createFromStd($model->RegisteredSale);
        }

        return $model;
    }
}

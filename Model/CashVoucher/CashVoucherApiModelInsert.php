<?php

namespace Fousky\Component\iDoklad\Model\CashVoucher;

use Fousky\Component\iDoklad\LOV\MovementTypeEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
use Fousky\Component\iDoklad\Model\RegisteredSale\ElectronicRecordsOfSalesApiModel;
use Fousky\Component\iDoklad\LOV\ExportedStateEnum;
use Fousky\Component\iDoklad\Model\CashVoucher\CashVoucherItemApiModelInsert;

/**
 * @method null|int getCashRegisterId()
 * @method null|\DateTime getDateOfTransaction()
 * @method null|int getDocumentSerialNumber()
 * @method null|ElectronicRecordsOfSalesApiModel getElectronicRecordsOfSales()
 * @method null|float getExchangeRate()
 * @method null|float getExchangeRateAmount()
 * @method null|ExportedStateEnum getExported()
 * @method null|CashVoucherItemApiModelInsert getItem()
 * @method null|MovementTypeEnum getMovementType()
 * @method null|int getMyCompanyDocumentAddressId()
 * @method null|int getPartnerContactId()
 * @method null|int getPartnerDocumentAddressId()
 * @method null|string getPerson()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CashVoucherApiModelInsert extends iDokladAbstractModel
{
    public $CashRegisterId;
    public $DateOfTransaction;
    public $DocumentSerialNumber;
    public $ElectronicRecordsOfSales;
    public $ExchangeRate;
    public $ExchangeRateAmount;
    public $Exported;
    public $Item;
    public $MovementType;
    public $MyCompanyDocumentAddressId;
    public $PartnerContactId;
    public $PartnerDocumentAddressId;
    public $Person;

    /**
     * @return array
     */
    public static function getDateTimeProperties(): array
    {
        return [
            'DateOfTransaction',
        ];
    }

    /**
     * @param \stdClass $data
     *
     * @return iDokladModelInterface
     */
    public static function createFromStd(\stdClass $data): iDokladModelInterface
    {
        /** @var CashVoucherApiModelInsert $model */
        $model = parent::createFromStd($data);

        if ($model->ElectronicRecordsOfSales instanceof \stdClass) {
            $model->ElectronicRecordsOfSales = ElectronicRecordsOfSalesApiModel::createFromStd(
                $model->ElectronicRecordsOfSales
            );
        }

        if ($model->Exported !== null) {
            $model->Exported = new ExportedStateEnum((int) $model->Exported);
        }

        if ($model->Item instanceof \stdClass) {
            $model->Item = CashVoucherItemApiModelInsert::createFromStd($model->Item);
        }

        if ($model->MovementType !== null) {
            $model->MovementType = new MovementTypeEnum((int) $model->MovementType);
        }

        return $model;
    }
}

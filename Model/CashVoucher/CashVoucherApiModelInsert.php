<?php

namespace Fousky\Component\iDoklad\Model\CashVoucher;

use Fousky\Component\iDoklad\LOV\ExportedStateEnum;
use Fousky\Component\iDoklad\LOV\MovementTypeEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\RegisteredSale\ElectronicRecordsOfSalesApiModel;
use Symfony\Component\Validator\Constraints as Assert;

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
    /**
     * @Assert\NotBlank()
     * @Assert\GreaterThan(value="0")
     */
    public $CashRegisterId;

    /**
     * @Assert\NotBlank()
     */
    public $DateOfTransaction;
    public $DocumentSerialNumber;
    public $ElectronicRecordsOfSales;
    public $ExchangeRate;
    public $ExchangeRateAmount;
    public $Exported;

    /**
     * @var CashVoucherItemApiModelInsert
     *
     * @Assert\NotBlank()
     * @Assert\Valid()
     */
    public $Item;

    public $MovementType;
    public $MyCompanyDocumentAddressId;
    public $PartnerContactId;
    public $PartnerDocumentAddressId;
    public $Person;

    /**
     * @param CashVoucherItemApiModelInsert $Item
     * @param array                         $properties
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(CashVoucherItemApiModelInsert $Item, array $properties = [])
    {
        $this->Item = $Item;

        $this->processProperties($properties);
    }

    /**
     * @return array
     */
    public static function getDateMap(): array
    {
        return [
            'DateOfTransaction',
        ];
    }

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'ElectronicRecordsOfSales' => ElectronicRecordsOfSalesApiModel::class,
            'Item' => CashVoucherItemApiModelInsert::class,
        ];
    }

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'Exported' => ExportedStateEnum::class,
            'MovementType' => MovementTypeEnum::class,
        ];
    }
}

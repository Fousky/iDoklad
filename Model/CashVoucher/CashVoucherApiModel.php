<?php

namespace Fousky\Component\iDoklad\Model\CashVoucher;

use Fousky\Component\iDoklad\LOV\EetResponsibilityEnum;
use Fousky\Component\iDoklad\LOV\ExportedStateEnum;
use Fousky\Component\iDoklad\LOV\MovementTypeEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\RegisteredSale\RegisteredSaleApiModel;

/**
 * @method null|int getCashRegisterId()
 * @method null|int getCurrencyId()
 * @method null|\DateTime getDateLastChange()
 * @method null|\DateTime getDateOfTransaction()
 * @method null|string getDocumentNumber()
 * @method null|int getDocumentSerialNumber()
 * @method null|EetResponsibilityEnum getEetResponsibility()
 * @method null|float getExchangeRate()
 * @method null|float getExchangeRateAmount()
 * @method null|ExportedStateEnum getExported()
 * @method null|int getId()
 * @method null|bool getIsEet()
 * @method null|bool getIsSummarySalesReceipt()
 * @method null|CashVoucherItemApiModel getItem()
 * @method null|MovementTypeEnum getMovementType()
 * @method null|int getMyCompanyDocumentAddressId()
 * @method null|int getPartnerContactId()
 * @method null|int getPartnerDocumentAddressId()
 * @method null|string getPerson()
 * @method null|RegisteredSaleApiModel getRegisteredSale()
 * @method null|\DateTime getSummarySalesReceiptDate()
 * @method null|float getTotalVat()
 * @method null|float getTotalVatHc()
 * @method null|float getTotalWithoutVat()
 * @method null|float getTotalWithoutVatHc()
 * @method null|float getTotalWithVat()
 * @method null|float getTotalWithVatHc()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CashVoucherApiModel extends iDokladAbstractModel
{
    public $CashRegisterId;
    public $CurrencyId;
    public $DateLastChange;
    public $DateOfTransaction;
    public $DocumentNumber;
    public $DocumentSerialNumber;
    public $EetResponsibility;
    public $ExchangeRate;
    public $ExchangeRateAmount;
    public $Exported;
    public $Id;
    public $IsEet;
    public $IsSummarySalesReceipt;
    public $Item;
    public $MovementType;
    public $MyCompanyDocumentAddressId;
    public $PartnerContactId;
    public $PartnerDocumentAddressId;
    public $Person;
    public $RegisteredSale;
    public $SummarySalesReceiptDate;
    public $TotalVat;
    public $TotalVatHc;
    public $TotalWithoutVat;
    public $TotalWithoutVatHc;
    public $TotalWithVat;
    public $TotalWithVatHc;

    /**
     * @return array
     */
    public static function getDateMap(): array
    {
        return [
            'DateLastChange',
            'DateOfTransaction',
            'SummarySalesReceiptDate',
        ];
    }

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'Item'           => CashVoucherItemApiModel::class,
            'RegisteredSale' => RegisteredSaleApiModel::class,
        ];
    }

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'EetResponsibility' => EetResponsibilityEnum::class,
            'Exported'          => ExportedStateEnum::class,
            'MovementType'      => MovementTypeEnum::class,
        ];
    }
}

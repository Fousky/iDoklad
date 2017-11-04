<?php

namespace Fousky\Component\iDoklad\Model\SalesReceipts;

use Fousky\Component\iDoklad\LOV\EetResponsibilityEnum;
use Fousky\Component\iDoklad\LOV\ExportedStateEnum;
use Fousky\Component\iDoklad\LOV\ImportedStateEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\RegisteredSale\RegisteredSaleApiModel;

/**
 * @method null|int getCurrencyId()
 * @method null|\DateTime getDateOfIssue()
 * @method null|string getDocumentNumber()
 * @method null|int getDocumentSerialNumber()
 * @method null|EetResponsibilityEnum getEetResponsibility()
 * @method null|float getExchangeRate()
 * @method null|float getExchangeRateAmount()
 * @method null|ExportedStateEnum getExported()
 * @method null|string getExternalDocumentNumber()
 * @method null|int getId()
 * @method null|ImportedStateEnum getImported()
 * @method null|bool getIsAccounted()
 * @method null|bool getIsCumulative()
 * @method null|bool getIsEet()
 * @method null|string getName()
 * @method null|RegisteredSaleApiModel getRegisteredSale()
 * @method null|int getSalesPosEquipmentId()
 * @method null|SalesReceiptItemApiModel[] getSalesReceiptItems()
 * @method null|SalesReceiptPaymentApiModel[] getSalesReceiptPayments()
 * @method null|float getTotalVat()
 * @method null|float getTotalVatHc()
 * @method null|float getTotalWithoutVat()
 * @method null|float getTotalWithoutVatHc()
 * @method null|float getTotalWithVat()
 * @method null|float getTotalWithVatHc()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class SalesReceiptApiModel extends iDokladAbstractModel
{
    public $CurrencyId;
    public $DateOfIssue;
    public $DocumentNumber;
    public $DocumentSerialNumber;
    public $EetResponsibility;
    public $ExchangeRate;
    public $ExchangeRateAmount;
    public $Exported;
    public $ExternalDocumentNumber;
    public $Id;
    public $Imported;
    public $IsAccounted;
    public $IsCumulative;
    public $IsEet;
    public $Name;
    public $RegisteredSale;
    public $SalesPosEquipmentId;
    public $SalesReceiptItems;
    public $SalesReceiptPayments;
    public $TotalVat;
    public $TotalVatHc;
    public $TotalWithoutVat;
    public $TotalWithoutVatHc;
    public $TotalWithVat;
    public $TotalWithVatHc;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'RegisteredSale' => RegisteredSaleApiModel::class,
            'SalesReceiptItems' => SalesReceiptItemApiModel::class,
            'SalesReceiptPayments' => SalesReceiptPaymentApiModel::class,
        ];
    }

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'EetResponsibility' => EetResponsibilityEnum::class,
            'Exported' => ExportedStateEnum::class,
            'Imported' => ImportedStateEnum::class,
        ];
    }
}

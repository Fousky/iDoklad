<?php

namespace Fousky\Component\iDoklad\Model\RegisteredSale;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|float getBaseTaxBasicRateHc()
 * @method null|float getBaseTaxReducedRate1Hc()
 * @method null|float getBaseTaxReducedRate2Hc()
 * @method null|float getBaseTaxZeroRateHc()
 * @method null|string getBkp()
 * @method null|\DateTime getDateOfAnswer()
 * @method null|\DateTime getDateOfSale()
 * @method null|\DateTime getDateOfSend()
 * @method null|string getFik()
 * @method null|string getPkp()
 * @method null|string getReceiptNumber()
 * @method null|int getSalesOfficeDesignation()
 * @method null|int getSalesPosEquipmentId()
 * @method null|float getTaxBasicRateHc()
 * @method null|float getTaxReducedRate1Hc()
 * @method null|float getTaxReducedRate2Hc()
 * @method null|float getTotalAdvancePayment()
 * @method null|float getTotalFromAdvancePayment()
 * @method null|float getTotalTravelServiceHc()
 * @method null|float getTotalUsedGoodsBasicRateHc()
 * @method null|float getTotalUsedGoodsReducedRate1Hc()
 * @method null|float getTotalUsedGoodsReducedRate2Hc()
 * @method null|float getTotalWithVatHc()
 * @method null|string getUuid()
 * @method null|string getVatIdentificationNumber()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class RegisteredSaleInformationApiModel extends iDokladAbstractModel
{
    public $BaseTaxBasicRateHc;
    public $BaseTaxReducedRate1Hc;
    public $BaseTaxReducedRate2Hc;
    public $BaseTaxZeroRateHc;
    public $Bkp;
    public $DateOfAnswer;
    public $DateOfSale;
    public $DateOfSend;
    public $Fik;
    public $Pkp;
    public $ReceiptNumber;
    public $SalesOfficeDesignation;
    public $SalesPosEquipmentId;
    public $TaxBasicRateHc;
    public $TaxReducedRate1Hc;
    public $TaxReducedRate2Hc;
    public $TotalAdvancePayment;
    public $TotalFromAdvancePayment;
    public $TotalTravelServiceHc;
    public $TotalUsedGoodsBasicRateHc;
    public $TotalUsedGoodsReducedRate1Hc;
    public $TotalUsedGoodsReducedRate2Hc;
    public $TotalWithVatHc;
    public $Uuid;
    public $VatIdentificationNumber;

    /**
     * @return array
     */
    public static function getDateTimeProperties(): array
    {
        return [
            'DateOfAnswer',
            'DateOfSale',
            'DateOfSend',
        ];
    }
}

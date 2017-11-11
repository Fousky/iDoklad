<?php

namespace Fousky\Component\iDoklad\Model\RegisteredSale;

use Fousky\Component\iDoklad\LOV\DocumentTypeEnum;
use Fousky\Component\iDoklad\LOV\EetRegimeEnum;
use Fousky\Component\iDoklad\LOV\RegisteredSaleStateEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|float getBaseTaxBasicRateHc()
 * @method null|float getBaseTaxReducedRate1Hc()
 * @method null|float getBaseTaxReducedRate2Hc()
 * @method null|float getBaseTaxZeroRateHc()
 * @method null|string getBkp()
 * @method null|int getCancelledRegisteredSaleId()
 * @method null|int getCashVoucherId()
 * @method null|\DateTime getDateOfAnswer()
 * @method null|\DateTime getDateOfSale()
 * @method null|\DateTime getDateOfSend()
 * @method null|string getDocumentNumber()
 * @method null|DocumentTypeEnum getDocumentType()
 * @method null|EetRegimeEnum getEetRegime()
 * @method null|int getErrorCode()
 * @method null|string getErrorText()
 * @method null|string getFik()
 * @method null|int getId()
 * @method null|bool getIsCanceled()
 * @method null|bool getIsFirstReport()
 * @method null|int getIssuedInvoiceId()
 * @method null|int getIssuedInvoicePaymentId()
 * @method null|string getPkp()
 * @method null|string getReceiptNumber()
 * @method null|int getSalesOfficeDesignation()
 * @method null|string getSalesPosEquipmentDesignation()
 * @method null|int getSalesPosEquipmentId()
 * @method null|int getSalesReceiptId()
 * @method null|RegisteredSaleStateEnum getStatus()
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
class RegisteredSaleApiModel extends iDokladAbstractModel
{
    public $BaseTaxBasicRateHc;
    public $BaseTaxReducedRate1Hc;
    public $BaseTaxReducedRate2Hc;
    public $BaseTaxZeroRateHc;
    public $Bkp;
    public $CancelledRegisteredSaleId;
    public $CashVoucherId;
    public $DateOfAnswer;
    public $DateOfSale;
    public $DateOfSend;
    public $DocumentNumber;
    public $DocumentType;
    public $EetRegime;
    public $ErrorCode;
    public $ErrorText;
    public $Fik;
    public $Id;
    public $IsCanceled;
    public $IsFirstReport;
    public $IssuedInvoiceId;
    public $IssuedInvoicePaymentId;
    public $Pkp;
    public $ReceiptNumber;
    public $SalesOfficeDesignation;
    public $SalesPosEquipmentDesignation;
    public $SalesPosEquipmentId;
    public $SalesReceiptId;
    public $Status;
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
    public static function getDateMap(): array
    {
        return [
            'DateOfAnswer',
            'DateOfSale',
            'DateOfSend',
        ];
    }

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'DocumentType' => DocumentTypeEnum::class,
            'EetRegime' => EetRegimeEnum::class,
            'Status' => RegisteredSaleStateEnum::class,
        ];
    }
}

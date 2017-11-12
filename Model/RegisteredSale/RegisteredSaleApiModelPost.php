<?php

namespace Fousky\Component\iDoklad\Model\RegisteredSale;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @method null|float getBaseTaxBasicRateHc()
 * @method null|float getBaseTaxReducedRate1Hc()
 * @method null|float getBaseTaxReducedRate2Hc()
 * @method null|float getBaseTaxZeroRateHc()
 * @method null|string getBkp()
 * @method null|int getCancelledRegisteredSaleId()
 * @method null|\DateTime getDateOfAnswer()
 * @method null|\DateTime getDateOfSale()
 * @method null|\DateTime getDateOfSend()
 * @method null|string getFik()
 * @method null|bool getIsCanceled()
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
class RegisteredSaleApiModelPost extends iDokladAbstractModel
{
    /** @Assert\Type(type="float") */
    public $BaseTaxBasicRateHc;

    /** @Assert\Type(type="float") */
    public $BaseTaxReducedRate1Hc;

    /** @Assert\Type(type="float") */
    public $BaseTaxReducedRate2Hc;

    /** @Assert\Type(type="float") */
    public $BaseTaxZeroRateHc;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     * @Assert\Regex(pattern="^([0-9a-fA-F]{8}-){4}[0-9a-fA-F]{8}$")
     */
    public $Bkp;

    /** @Assert\Type(type="int") */
    public $CancelledRegisteredSaleId;

    /** @Assert\DateTime() */
    public $DateOfAnswer;

    /** @Assert\DateTime() */
    public $DateOfSale;

    /** @Assert\DateTime() */
    public $DateOfSend;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     * @Assert\Regex(pattern="^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-4[0-9a-fA-F]{3}-[89abAB][0-9a-fAF]{3}-[0-9a-fA-F]{12}-[0-9a-fA-F]{2}$")
     */
    public $Fik;

    /** @Assert\Type(type="bool") */
    public $IsCanceled;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     * @Assert\Length(min="344", max="344")
     */
    public $Pkp;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     * @Assert\Regex(pattern="^[0-9a-zA-Z\.,:;/#\-_ ]{1,20}$")
     */
    public $ReceiptNumber;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="int")
     * @Assert\Regex(pattern="^[1-9][0-9]{0,5}$")
     */
    public $SalesOfficeDesignation;

    /** @Assert\Type(type="int") */
    public $SalesPosEquipmentId;

    /** @Assert\Type(type="float") */
    public $TaxBasicRateHc;

    /** @Assert\Type(type="float") */
    public $TaxReducedRate1Hc;

    /** @Assert\Type(type="float") */
    public $TaxReducedRate2Hc;

    /** @Assert\Type(type="float") */
    public $TotalAdvancePayment;

    /** @Assert\Type(type="float") */
    public $TotalFromAdvancePayment;

    /** @Assert\Type(type="float") */
    public $TotalTravelServiceHc;

    /** @Assert\Type(type="float") */
    public $TotalUsedGoodsBasicRateHc;

    /** @Assert\Type(type="float") */
    public $TotalUsedGoodsReducedRate1Hc;

    /** @Assert\Type(type="float") */
    public $TotalUsedGoodsReducedRate2Hc;

    /** @Assert\Type(type="float") */
    public $TotalWithVatHc;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     */
    public $Uuid;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     * @Assert\Regex(pattern="^CZ[0-9]{8,10}$")
     */
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
}

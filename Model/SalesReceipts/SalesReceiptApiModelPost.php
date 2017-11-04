<?php

namespace Fousky\Component\iDoklad\Model\SalesReceipts;

use Fousky\Component\iDoklad\LOV\ExportedStateEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\RegisteredSale\ElectronicRecordsOfSalesApiModel;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @method null|\DateTime getDateOfIssue()
 * @method null|int getDocumentSerialNumber()
 * @method null|ElectronicRecordsOfSalesApiModel getElectronicRecordsOfSales()
 * @method null|ExportedStateEnum getExported()
 * @method null|string getExternalDocumentNumber()
 * @method null|bool getIsCumulative()
 * @method null|string getName()
 * @method null|int getSalesPosEquipmentId()
 * @method null|SalesReceiptItemApiModelPost[]|ArrayCollection getSalesReceiptItems()
 * @method null|SalesReceiptPaymentApiModelPost[]|ArrayCollection getSalesReceiptPayments()
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class SalesReceiptApiModelPost extends iDokladAbstractModel
{
    public $DateOfIssue;
    public $DocumentSerialNumber;

    /**
     * @var ElectronicRecordsOfSalesApiModel[]
     *
     * @Assert\Valid()
     */
    public $ElectronicRecordsOfSales;
    public $Exported;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min="0", max="20")
     */
    public $ExternalDocumentNumber;
    public $IsCumulative;
    public $Name;
    public $SalesPosEquipmentId;

    /**
     * @var SalesReceiptItemApiModelPost[]
     *
     * @Assert\Valid()
     * @Assert\NotBlank()
     * @Assert\Count(min="1")
     */
    public $SalesReceiptItems;

    /**
     * @var SalesReceiptPaymentApiModelPost[]
     *
     * @Assert\Valid()
     * @Assert\NotBlank()
     * @Assert\Count(min="1")
     */
    public $SalesReceiptPayments;

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'Exported' => ExportedStateEnum::class,
        ];
    }

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'ElectronicRecordsOfSales' => ElectronicRecordsOfSalesApiModel::class,
            'SalesReceiptItems' => SalesReceiptItemApiModelPost::class,
            'SalesReceiptPayments' => SalesReceiptPaymentApiModelPost::class,
        ];
    }

    /**
     * @return array
     */
    public static function getDateMap(): array
    {
        return [
            'DateOfIssue',
        ];
    }
}
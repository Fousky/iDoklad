<?php

namespace Fousky\Component\iDoklad\Model\IssuedDocumentPayments;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\RegisteredSale\ElectronicRecordsOfSalesApiModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @method null|\DateTime getDateOfPayment()
 * @method null|\DateTime getDateOfVatApplication()
 * @method null|ElectronicRecordsOfSalesApiModel getElectronicRecordsOfSales()
 * @method null|int getInvoiceId()
 * @method null|float getPaymentAmount()
 * @method null|int getPaymentOptionId()
 * @method null|int getSalesPosEquipmentId()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class IssuedDocumentPaymentApiModelInsert extends iDokladAbstractModel
{
    /**
     * @Assert\DateTime()
     */
    public $DateOfPayment;

    /**
     * @Assert\DateTime()
     */
    public $DateOfVatApplication;

    /**
     * @var null|ElectronicRecordsOfSalesApiModel
     * @Assert\Valid()
     */
    public $ElectronicRecordsOfSales;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="int")
     */
    public $InvoiceId;

    /**
     * @Assert\Type(type="float")
     */
    public $PaymentAmount;

    /**
     * @Assert\Type(type="int")
     */
    public $PaymentOptionId;

    /**
     * @Assert\Type(type="int")
     */
    public $SalesPosEquipmentId;

    /**
     * @param mixed $ElectronicRecordsOfSales
     *
     * @return $this
     */
    public function setElectronicRecordsOfSales(ElectronicRecordsOfSalesApiModel $ElectronicRecordsOfSales)
    {
        $this->ElectronicRecordsOfSales = $ElectronicRecordsOfSales;

        return $this;
    }

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'ElectronicRecordsOfSales' => ElectronicRecordsOfSalesApiModel::class,
        ];
    }

    /**
     * @return array
     */
    public static function getDateMap(): array
    {
        return [
            'DateOfPayment',
            'DateOfVatApplication',
        ];
    }
}

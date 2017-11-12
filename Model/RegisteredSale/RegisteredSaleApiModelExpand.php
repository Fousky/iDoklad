<?php

namespace Fousky\Component\iDoklad\Model\RegisteredSale;

use Fousky\Component\iDoklad\Model\CashVoucher\CashVoucherApiModel;
use Fousky\Component\iDoklad\Model\IssuedDocumentPayments\IssuedDocumentPaymentApiModel;
use Fousky\Component\iDoklad\Model\IssuedInvoices\IssuedInvoiceApiModel;
use Fousky\Component\iDoklad\Model\SalesPosEquipment\SalesPosEquipmentApiModel;
use Fousky\Component\iDoklad\Model\SalesReceipts\SalesReceiptApiModel;

/**
 * @method null|RegisteredSaleApiModel getCancelledRegisteredSale()
 * @method null|CashVoucherApiModel getCashVoucher()
 * @method null|IssuedInvoiceApiModel getIssuedInvoice()
 * @method null|IssuedDocumentPaymentApiModel getIssuedInvoicePayment()
 * @method null|SalesPosEquipmentApiModel getSalesPosEquipment()
 * @method null|SalesReceiptApiModel getSalesReceipt()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class RegisteredSaleApiModelExpand extends RegisteredSaleApiModel
{
    public $CancelledRegisteredSale;
    public $CashVoucher;
    public $IssuedInvoice;
    public $IssuedInvoicePayment;
    public $SalesPosEquipment;
    public $SalesReceipt;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'CancelledRegisteredSale' => RegisteredSaleApiModel::class,
            'CashVoucher' => CashVoucherApiModel::class,
            'IssuedInvoice' => IssuedInvoiceApiModel::class,
            'IssuedInvoicePayment' => IssuedDocumentPaymentApiModel::class,
            'SalesPosEquipment' => SalesPosEquipmentApiModel::class,
            'SalesReceipt' => SalesReceiptApiModel::class,
        ];
    }
}

<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
class DocumentTypeEnum
{
    const ISSUED_INVOICE = 0;
    const PROFORMA_INVOICE = 1;
    const CASH_VOUCHER = 2;
    const CREDIT_NOTE = 3;
    const BANK_STATEMENT = 4;
    const RECEIVED_INVOICE = 5;
    const SALES_RECEIPT = 6;
    const SALES_ORDER = 7;
    const REGISTERED_SALE = 101;

    /** @var int $value */
    protected $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return bool
     */
    public function isIssuedInvoice(): bool
    {
        return $this->value === self::ISSUED_INVOICE;
    }

    /**
     * @return bool
     */
    public function isProformaInvoice(): bool
    {
        return $this->value === self::PROFORMA_INVOICE;
    }

    /**
     * @return bool
     */
    public function isCashVoucher(): bool
    {
        return $this->value === self::CASH_VOUCHER;
    }

    /**
     * @return bool
     */
    public function isCreditNote(): bool
    {
        return $this->value === self::CREDIT_NOTE;
    }

    /**
     * @return bool
     */
    public function isBankStatement(): bool
    {
        return $this->value === self::BANK_STATEMENT;
    }

    /**
     * @return bool
     */
    public function isReceivedInvoice(): bool
    {
        return $this->value === self::RECEIVED_INVOICE;
    }

    /**
     * @return bool
     */
    public function isSalesReceipt(): bool
    {
        return $this->value === self::SALES_RECEIPT;
    }

    /**
     * @return bool
     */
    public function isSalesOrder(): bool
    {
        return $this->value === self::SALES_ORDER;
    }

    /**
     * @return bool
     */
    public function isRegisteredSale(): bool
    {
        return $this->value === self::REGISTERED_SALE;
    }
}

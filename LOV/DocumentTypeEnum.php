<?php

namespace Fousky\Component\iDoklad\LOV;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class DocumentTypeEnum extends iDokladAbstractEnum
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

    /**
     * @return bool
     */
    public function isIssuedInvoice(): bool
    {
        return self::ISSUED_INVOICE === $this->value;
    }

    /**
     * @return bool
     */
    public function isProformaInvoice(): bool
    {
        return self::PROFORMA_INVOICE === $this->value;
    }

    /**
     * @return bool
     */
    public function isCashVoucher(): bool
    {
        return self::CASH_VOUCHER === $this->value;
    }

    /**
     * @return bool
     */
    public function isCreditNote(): bool
    {
        return self::CREDIT_NOTE === $this->value;
    }

    /**
     * @return bool
     */
    public function isBankStatement(): bool
    {
        return self::BANK_STATEMENT === $this->value;
    }

    /**
     * @return bool
     */
    public function isReceivedInvoice(): bool
    {
        return self::RECEIVED_INVOICE === $this->value;
    }

    /**
     * @return bool
     */
    public function isSalesReceipt(): bool
    {
        return self::SALES_RECEIPT === $this->value;
    }

    /**
     * @return bool
     */
    public function isSalesOrder(): bool
    {
        return self::SALES_ORDER === $this->value;
    }

    /**
     * @return bool
     */
    public function isRegisteredSale(): bool
    {
        return self::REGISTERED_SALE === $this->value;
    }
}

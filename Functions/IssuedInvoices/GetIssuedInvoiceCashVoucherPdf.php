<?php

namespace Fousky\Component\iDoklad\Functions\IssuedInvoices;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=GET-api-v2-IssuedInvoices-id-GetCashVoucherPdf
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetIssuedInvoiceCashVoucherPdf extends GetIssuedInvoicePdf
{
    /**
     * Return base URI, e.g. /invoices; /invoice/1/edit and so on.
     *
     * @see iDoklad::call()
     *
     * @return string
     */
    public function getUri(): string
    {
        return sprintf('IssuedInvoices/%s/GetCashVoucherPdf', $this->id);
    }
}

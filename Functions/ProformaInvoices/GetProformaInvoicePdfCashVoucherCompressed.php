<?php

namespace Fousky\Component\iDoklad\Functions\ProformaInvoices;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=GET-api-v2-ProformaInvoices-id-GetCashVoucherPdfCompressed
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetProformaInvoicePdfCashVoucherCompressed extends GetProformaInvoicePdfCompressed
{
    /**
     * @return string
     */
    public function getUri(): string
    {
        return sprintf('ProformaInvoices/%s/GetCashVoucherPdfCompressed', $this->id);
    }
}

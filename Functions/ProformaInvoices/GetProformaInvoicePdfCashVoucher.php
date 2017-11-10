<?php

namespace Fousky\Component\iDoklad\Functions\ProformaInvoices;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=GET-api-v2-ProformaInvoices-id-GetCashVoucherPdf
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetProformaInvoicePdfCashVoucher extends GetProformaInvoicePdf
{
    /**
     * @return string
     */
    public function getUri(): string
    {
        return sprintf('ProformaInvoices/%s/GetCashVoucherPdf', $this->id);
    }
}

<?php

namespace Fousky\Component\iDoklad\Functions\ProformaInvoices;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=GET-api-v2-ProformaInvoices-id-PurchaserDocumentAddress
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetProformaInvoicePurchaserDocumentAddress extends GetProformaInvoiceMyDocumentAddress
{
    /**
     * @return string
     */
    public function getUri(): string
    {
        return sprintf('ProformaInvoices/%s/PurchaserDocumentAddress', $this->id);
    }
}

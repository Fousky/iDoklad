<?php

namespace Fousky\Component\iDoklad\Functions\ProformaInvoices;

use Fousky\Component\iDoklad\Model\Other\ZipBase64Model;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=GET-api-v2-ProformaInvoices-id-GetPdfWithPaymentsCompressed_onlyEetPayments
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetProformaInvoicePdfWithPaymentsCompressed extends GetProformaInvoicePdfWithPayments
{
    /**
     * Get iDokladModelInterface class.
     *
     * @see iDokladModelInterface
     *
     * @return string
     */
    public function getModelClass(): string
    {
        return ZipBase64Model::class;
    }

    /**
     * Return base URI, e.g. /invoices; /invoice/1/edit and so on.
     *
     * @see iDoklad::call()
     *
     * @return string
     */
    public function getUri(): string
    {
        return sprintf(
            'ProformaInvoices/%s/GetPdfWithPaymentsCompressed?onlyEetPayments=%s',
            $this->id,
            $this->onlyEetPayments === true ? 1 : 0
        );
    }
}

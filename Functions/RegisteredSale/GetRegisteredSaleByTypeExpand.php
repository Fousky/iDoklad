<?php

namespace Fousky\Component\iDoklad\Functions\RegisteredSale;

use Fousky\Component\iDoklad\Model\RegisteredSale\RegisteredSaleApiModelExpand;

/**
 * https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=GET-api-v2-RegisteredSales-type-id-Expand
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetRegisteredSaleByTypeExpand extends GetRegisteredSaleByType
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
        return RegisteredSaleApiModelExpand::class;
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
            'RegisteredSales/%s/%s/Expand',
            $this->type,
            $this->id
        );
    }
}

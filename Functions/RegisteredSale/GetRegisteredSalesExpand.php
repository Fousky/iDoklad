<?php

namespace Fousky\Component\iDoklad\Functions\RegisteredSale;

use Fousky\Component\iDoklad\Model\RegisteredSale\RegisteredSaleApiCollectionModelExpand;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=GET-api-v2-RegisteredSales-Expand
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetRegisteredSalesExpand extends GetRegisteredSales
{
    /**
     * @return string
     */
    public function getModelClass(): string
    {
        return RegisteredSaleApiCollectionModelExpand::class;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'RegisteredSales/Expand';
    }
}

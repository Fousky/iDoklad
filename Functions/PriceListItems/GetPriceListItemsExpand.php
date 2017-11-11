<?php

namespace Fousky\Component\iDoklad\Functions\PriceListItems;

use Fousky\Component\iDoklad\Model\PriceListItems\PriceListApiCollectionModelExpand;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=GET-api-v2-PriceListItems-Expand
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class GetPriceListItemsExpand extends GetPriceListItems
{
    /**
     * @return string
     */
    public function getModelClass(): string
    {
        return PriceListApiCollectionModelExpand::class;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'PriceListItems/Expand';
    }
}

<?php

namespace Fousky\Component\iDoklad\Model\PriceListItems;

use Fousky\Component\iDoklad\Model\Currencies\CurrencyApiModel;

/**
 * @method null|CurrencyApiModel getCurrency()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class PriceListApiModelExpand extends PriceListApiModel
{
    public $Currency;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        $map = parent::getModelMap();

        $map['Currency'] = CurrencyApiModel::class;

        return $map;
    }
}

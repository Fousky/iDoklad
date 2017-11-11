<?php

namespace Fousky\Component\iDoklad\Model\PriceListItems;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @method null|string getBarCode()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class PriceListPatchModel extends PriceListPutModelV2
{
    /** @Assert\Type(type="string") */
    public $BarCode;
}

<?php

namespace Fousky\Component\iDoklad\Model\PriceListItems;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @method null|int[] getItems()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class BatchModelOfInt32 extends iDokladAbstractModel
{
    /**
     * @Assert\NotBlank()
     * @Assert\Count(min="1")
     * @Assert\All(constraints={
     *     @Assert\Type(type="int")
     * })
     */
    public $Items;
}

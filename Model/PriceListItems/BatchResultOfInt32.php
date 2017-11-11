<?php

namespace Fousky\Component\iDoklad\Model\PriceListItems;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\LOV\BatchResultTypeEnum;

/**
 * @method null|BatchItemResultOfInt32[] getResults()
 * @method null|BatchResultTypeEnum getStatus()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class BatchResultOfInt32 extends iDokladAbstractModel
{
    /**
     * @var BatchItemResultOfInt32[]
     */
    public $Results;

    /**
     * @var BatchResultTypeEnum
     */
    public $Status;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'Results' => BatchItemResultOfInt32::class,
        ];
    }

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'Status' => BatchResultTypeEnum::class,
        ];
    }
}

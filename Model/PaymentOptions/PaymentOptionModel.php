<?php

namespace Fousky\Component\iDoklad\Model\PaymentOptions;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method string|null getId()
 * @method string|null getCode()
 * @method string|null getDateLastChange()
 * @method string|null getIsDefault()
 * @method string|null getIsRounded()
 * @method string|null getName()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class PaymentOptionModel extends iDokladAbstractModel
{
    public $Id;
    public $Code;
    public $DateLastChange;
    public $IsDefault;
    public $IsRounded;
    public $Name;

    /**
     * @return array
     */
    public static function getDateMap(): array
    {
        return [
            'DateLastChange',
        ];
    }
}

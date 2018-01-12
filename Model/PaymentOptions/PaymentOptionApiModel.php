<?php

namespace Fousky\Component\iDoklad\Model\PaymentOptions;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|int getId()
 * @method null|string getCode()
 * @method null|\DateTime getDateLastChange()
 * @method null|bool getIsDefault()
 * @method null|bool getIsRounded()
 * @method null|string getName()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class PaymentOptionApiModel extends iDokladAbstractModel
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

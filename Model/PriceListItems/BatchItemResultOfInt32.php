<?php

namespace Fousky\Component\iDoklad\Model\PriceListItems;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|int getData()
 * @method null|bool getIsSuccess()
 * @method null|string getMessage()
 * @method null|int getStatusCode()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class BatchItemResultOfInt32 extends iDokladAbstractModel
{
    public $Data;
    public $IsSuccess;
    public $Message;
    public $StatusCode;
}

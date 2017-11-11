<?php

namespace Fousky\Component\iDoklad\Model\Banks;

use Fousky\Component\iDoklad\Model\Currencies\CurrencyApiModel;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|string getAccountNumber()
 * @method null|BankApiModel getBank()
 * @method null|int getBankId()
 * @method null|CurrencyApiModel getCurrency()
 * @method null|int getCurrencyId()
 * @method null|\DateTime getDateLastChange()
 * @method null|string getIban()
 * @method null|int getId()
 * @method null|bool getIsDefault()
 * @method null|string getName()
 * @method null|string getSwift()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class BankAccountApiModel extends iDokladAbstractModel
{
    public $AccountNumber;
    public $Bank;
    public $BankId;
    public $Currency;
    public $CurrencyId;
    public $DateLastChange;
    public $Iban;
    public $Id;
    public $IsDefault;
    public $Name;
    public $Swift;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'Bank' => BankApiModel::class,
            'Currency' => CurrencyApiModel::class,
        ];
    }

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

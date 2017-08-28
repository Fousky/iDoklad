<?php

namespace Fousky\Component\iDoklad\Model\BankAccounts;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|string getAccountNumber()
 * @method null|int getBankId()
 * @method null|int getCurrencyId()
 * @method null|string getIban()
 * @method null|int getId()
 * @method null|string getName()
 * @method null|string getSwift()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class BankAccountPostApiModel extends iDokladAbstractModel
{
    public $AccountNumber;
    public $BankId;
    public $CurrencyId;
    public $Iban;
    public $Id;
    public $Name;
    public $Swift;
}

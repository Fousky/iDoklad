<?php

namespace Fousky\Component\iDoklad\Model\BankAccounts;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @method null|string getAccountNumber()
 * @method null|int getBankId()
 * @method null|int getCurrencyId()
 * @method null|string getIban()
 * @method null|string getName()
 * @method null|string getSwift()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class BankAccountPostApiModel extends iDokladAbstractModel
{
    /**
     * @Assert\Length(min="0", max="50")
     */
    public $AccountNumber;

    public $BankId;

    /**
     * @Assert\NotBlank()
     */
    public $CurrencyId;

    /**
     * @Assert\Length(min="0", max="50")
     */
    public $Iban;

    /**
     * @Assert\Length(min="0", max="100")
     */
    public $Name;

    /**
     * @Assert\Length(min="0", max="11")
     */
    public $Swift;

    /**
     * @param array $properties
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(array $properties = [])
    {
        $this->processProperties($properties);
    }
}

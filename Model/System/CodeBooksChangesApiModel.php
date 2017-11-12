<?php

namespace Fousky\Component\iDoklad\Model\System;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CodeBooksChangesApiModel extends iDokladAbstractModel
{
    public $Bank = false;
    public $ConstantSymbols = false;
    public $Country = false;
    public $Currencies = false;
    public $ExchangeRates = false;
    public $PaymentOptions = false;
    public $VatRates = false;

    /**
     * @return bool
     */
    public function wasChangedBank(): bool
    {
        return $this->Bank;
    }

    /**
     * @return bool
     */
    public function wasChangedConstantSymbols(): bool
    {
        return $this->ConstantSymbols;
    }

    /**
     * @return bool
     */
    public function wasChangedCountry(): bool
    {
        return $this->Country;
    }

    /**
     * @return bool
     */
    public function wasChangedCurrencies(): bool
    {
        return $this->Currencies;
    }

    /**
     * @return bool
     */
    public function wasChangedExchangeRates(): bool
    {
        return $this->ExchangeRates;
    }

    /**
     * @return bool
     */
    public function wasChangedPaymentOptions(): bool
    {
        return $this->PaymentOptions;
    }

    /**
     * @return bool
     */
    public function wasChangedVatRates(): bool
    {
        return $this->VatRates;
    }
}

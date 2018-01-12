<?php

namespace Fousky\Component\iDoklad\Model\CashVoucher;

use Fousky\Component\iDoklad\LOV\PriceTypeWithoutOnlyBaseEnum;
use Fousky\Component\iDoklad\LOV\VatRateTypeEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|float getAmount()
 * @method null|int getId()
 * @method null|string getName()
 * @method null|float getPrice()
 * @method null|PriceTypeWithoutOnlyBaseEnum getPriceType()
 * @method null|bool getStatus()
 * @method null|string getVariableSymbol()
 * @method null|float getVatRate()
 * @method null|VatRateTypeEnum getVatRateType()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CashVoucherItemApiModelUpdate extends iDokladAbstractModel
{
    public $Amount;

    public $Name;

    public $Price;

    public $PriceType;

    public $Status;

    public $VariableSymbol;

    public $VatRate;

    public $VatRateType;

    /**
     * @param string $Name
     * @param float  $Price
     * @param array  $properties Properties key=>value see getAvailableProperties()
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(string $Name, float $Price, array $properties = [])
    {
        $this->Name = $Name;
        $this->Price = $Price;

        $this->processProperties($properties);
    }

    /**
     * @return array
     */
    public function getAvailableProperties(): array
    {
        return [
            'Amount',
            'PriceType',
            'Status',
            'VariableSymbol',
            'VatRate',
            'VatRateType',
        ];
    }
}

<?php

namespace Fousky\Component\iDoklad\Model\CashVoucher;

use Fousky\Component\iDoklad\LOV\PriceTypeWithoutOnlyBaseEnum;
use Fousky\Component\iDoklad\LOV\VatRateTypeEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @method null|float getAmount()
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
class CashVoucherItemApiModelInsert extends iDokladAbstractModel
{
    /**
     * @Assert\NotBlank()
     */
    public $Amount;

    /**
     * @Assert\NotBlank()
     */
    public $Name;

    /**
     * @Assert\NotBlank()
     */
    public $Price;

    public $PriceType;

    public $Status;

    public $VariableSymbol;

    public $VatRate;

    public $VatRateType;

    /**
     * @param array $properties
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(array $properties = [])
    {
        $this->processProperties($properties);
    }

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'PriceType' => PriceTypeWithoutOnlyBaseEnum::class,
            'VatRateType' => VatRateTypeEnum::class,
        ];
    }
}

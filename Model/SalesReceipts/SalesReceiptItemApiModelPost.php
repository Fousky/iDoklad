<?php

namespace Fousky\Component\iDoklad\Model\SalesReceipts;

use Fousky\Component\iDoklad\LOV\PriceTypeEnum;
use Fousky\Component\iDoklad\LOV\VatRateTypeEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/ResourceModel?modelName=SalesReceiptItemApiModelPost
 *
 * @method null|float getAmount()
 * @method null|string getName()
 * @method null|float getPrice()
 * @method null|int getPriceListItemId()
 * @method null|PriceTypeEnum getPriceType()
 * @method null|string getUnit()
 * @method null|VatRateTypeEnum getVatRateType()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class SalesReceiptItemApiModelPost extends iDokladAbstractModel
{
    public $Amount;

    /**
     * @Assert\NotBlank()
     */
    public $Name;
    public $Price;
    public $PriceListItemId;
    public $PriceType;

    /**
     * @Assert\NotBlank()
     */
    public $Unit;
    public $VatRateType;

    /**
     * @param array $properties
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
            'PriceType'   => PriceTypeEnum::class,
            'VatRateType' => VatRateTypeEnum::class,
        ];
    }
}

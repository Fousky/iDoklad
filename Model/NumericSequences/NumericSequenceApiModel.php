<?php

namespace Fousky\Component\iDoklad\Model\NumericSequences;

use Fousky\Component\iDoklad\LOV\DocumentTypeEnum;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|DocumentTypeEnum getDocumentType()
 * @method null|int getId()
 * @method null|bool getIsDefault()
 * @method null|int getLastInvoiceNumber()
 * @method null|string getName()
 * @method null|string getNumberFormat()
 * @method null|int getYear()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class NumericSequenceApiModel extends iDokladAbstractModel
{
    public $DocumentType;
    public $Id;
    public $IsDefault;
    public $LastInvoiceNumber;
    public $Name;
    public $NumberFormat;
    public $Year;

    /**
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [
            'DocumentType' => DocumentTypeEnum::class,
        ];
    }
}

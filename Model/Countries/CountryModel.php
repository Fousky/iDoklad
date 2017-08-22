<?php

namespace Fousky\Component\iDoklad\Model\Countries;

use Fousky\Component\iDoklad\Model\Currencies\CurrencyApiModel;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;

/**
 * @method null|string getId()
 * @method null|string getCode()
 * @method null|string getCurrency()
 * @method null|string getCurrencyId()
 * @method null|\DateTime getDateLastChange()
 * @method null|string getName()
 * @method null|string getNameEnglish()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CountryModel extends iDokladAbstractModel
{
    public $Id;
    public $Code;
    public $Currency;
    public $CurrencyId;
    public $DateLastChange;
    public $Name;
    public $NameEnglish;

    /**
     * @param \stdClass $data
     *
     * @return iDokladModelInterface
     */
    public static function createFromStd(\stdClass $data): iDokladModelInterface
    {
        /** @var CountryModel $model */
        $model = parent::createFromStd($data);

        $model->Currency = CurrencyApiModel::createFromStd($model->Currency);

        return $model;
    }

    /**
     * @return array
     */
    public static function getDateTimeProperties(): array
    {
        return [
            'DateLastChange',
        ];
    }
}

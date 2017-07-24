<?php

namespace Fousky\Component\iDoklad\Model\Countries;

use Fousky\Component\iDoklad\Model\Currencies\CurrencyModel;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;

/**
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
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
        $model = new static();

        foreach ((array) $data as $key => $value) {

            if ($key === 'Currency') {
                $model->{$key} = CurrencyModel::createFromStd($value);
                continue;
            }

            if (property_exists($model, $key)) {
                $model->{$key} = $value;
            }
        }

        return $model;
    }
}

<?php

namespace Fousky\Component\iDoklad\Model\Countries;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @method null|ArrayCollection|CountryApiModel[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CountryCollectionModel extends iDokladAbstractModel
{
    protected $Data;
    protected $TotalItems = 0;
    protected $TotalPages = 0;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'Data' => CountryApiModel::class,
        ];
    }
}

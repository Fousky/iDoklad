<?php

namespace Fousky\Component\iDoklad\Model\CashRegister;

use Doctrine\Common\Collections\ArrayCollection;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;

/**
 * @method null|ArrayCollection|CashRegisterApiModel[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
class CashRegisterApiCollectionModel extends iDokladAbstractModel
{
    public $Data;
    public $TotalItems;
    public $TotalPages;

    /**
     * @param \stdClass $data
     *
     * @return iDokladModelInterface
     */
    public static function createFromStd(\stdClass $data): iDokladModelInterface
    {
        /** @var CashRegisterApiCollectionModel $model */
        $model = parent::createFromStd($data);

        $items = $model->Data;

        if (is_array($items)) {
            $collection = new ArrayCollection();
            foreach ($items as $item) {
                $collection->add(CashRegisterApiModel::createFromStd($item));
            }
            $model->Data = $collection;
        }

        return $model;
    }
}

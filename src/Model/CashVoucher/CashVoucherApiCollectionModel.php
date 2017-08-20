<?php

namespace Fousky\Component\iDoklad\Model\CashVoucher;

use Doctrine\Common\Collections\ArrayCollection;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;

/**
 * @method null|ArrayCollection|CashVoucherApiModel[] getData()
 * @method null|int getTotalItems()
 * @method null|int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CashVoucherApiCollectionModel extends iDokladAbstractModel
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
        /** @var CashVoucherApiCollectionModel $model */
        $model = parent::createFromStd($data);

        if (is_array($model->Data)) {
            $collection = new ArrayCollection();
            foreach ($model->Data as $item) {
                $collection->add(CashVoucherApiModel::createFromStd($item));
            }
            $model->Data = $collection;
        }

        return $model;
    }
}

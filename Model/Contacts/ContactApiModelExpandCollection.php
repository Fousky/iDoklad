<?php

namespace Fousky\Component\iDoklad\Model\Contacts;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|ContactApiModelExpand[] getData()
 * @method null|int getTotalItems()
 * @method null|int getPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ContactApiModelExpandCollection extends iDokladAbstractModel
{
    public $Data;
    public $TotalItems;
    public $TotalPages;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'Data' => ContactApiModelExpand::class,
        ];
    }
}

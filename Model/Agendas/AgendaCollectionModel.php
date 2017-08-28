<?php

namespace Fousky\Component\iDoklad\Model\Agendas;

use Doctrine\Common\Collections\ArrayCollection;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method ArrayCollection|AgendaModel[] getData()
 * @method int getTotalItems()
 * @method int getTotalPages()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class AgendaCollectionModel extends iDokladAbstractModel
{
    /** @var ArrayCollection|AgendaModel[] $Data */
    protected $Data;

    /** @var int $TotalItems */
    protected $TotalItems = 0;

    /** @var int $TotalPages */
    protected $TotalPages = 0;

    /**
     * @return array
     */
    public static function getModelMap(): array
    {
        return [
            'Data' => AgendaModel::class,
        ];
    }
}

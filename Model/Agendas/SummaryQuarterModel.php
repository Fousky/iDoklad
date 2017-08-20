<?php

namespace Fousky\Component\iDoklad\Model\Agendas;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method null|float getBilled()
 * @method null|int getRank()
 * @method null|string getTitle()
 * @method null|float getTotalPaid()
 * @method null|float getTotalProforma()
 * @method null|float getTotalUnPaid()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class SummaryQuarterModel extends iDokladAbstractModel
{
    public $Billed;
    public $Rank;
    public $Title;
    public $TotalPaid;
    public $TotalProforma;
    public $TotalUnPaid;
}

<?php

namespace Fousky\Component\iDoklad\Model\Agendas;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method int|null getContactId()
 * @method string|null getName()
 * @method float|null getTotalWithVatHc()
 *
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
class SummaryTopPartnerModel extends iDokladAbstractModel
{
    public $ContactId;
    public $Name;
    public $TotalWithVatHc;
}

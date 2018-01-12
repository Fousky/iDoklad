<?php

namespace Fousky\Component\iDoklad\Model\Agendas;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method int|null getContacts()
 * @method int|null getIssuedInvoices()
 * @method int|null getPriceListItems()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class AgendaSummaryModel extends iDokladAbstractModel
{
    public $Contacts;

    public $IssuedInvoices;

    public $PriceListItems;
}

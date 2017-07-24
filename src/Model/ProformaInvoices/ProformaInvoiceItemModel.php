<?php

namespace Fousky\Component\iDoklad\Model\ProformaInvoices;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
class ProformaInvoiceItemModel extends iDokladAbstractModel
{
    public $Id;
    public $Amount;
    public $Name;
    public $PriceListItemId;
    public $PriceType;
    public $Unit;
    public $UnitPrice;
    public $VatRateType;
}

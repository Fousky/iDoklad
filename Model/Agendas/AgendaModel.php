<?php

namespace Fousky\Component\iDoklad\Model\Agendas;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;

/**
 * @method string|null getId()
 * @method string|null getContactId()
 * @method string|null getCountOfDecimalsForAmount()
 * @method string|null getCountOfDecimalsForPrice()
 * @method string|null getDefaultCurrencyId()
 * @method string|null getEetRegime()
 * @method string|null getIsRegisteredForVat()
 * @method string|null getIsRegisteredForVatOnPay()
 * @method string|null getName()
 * @method string|null getPrefferedPrice()
 * @method string|null getPrefferedVatRate()
 * @method string|null getRoundingDifference()
 * @method string|null getVatRegistrationType()
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class AgendaModel extends iDokladAbstractModel
{
    protected $Id;

    protected $ContactId;

    protected $CountOfDecimalsForAmount;

    protected $CountOfDecimalsForPrice;

    protected $DefaultCurrencyId;

    protected $EetRegime;

    protected $IsRegisteredForVat;

    protected $IsRegisteredForVatOnPay;

    protected $Name;

    protected $PrefferedPrice;

    protected $PrefferedVatRate;

    protected $RoundingDifference;

    protected $VatRegistrationType;
}

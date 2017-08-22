<?php

namespace Fousky\Component\iDoklad\Functions\CashVoucher;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\LOV\ExportedStateEnum;
use Fousky\Component\iDoklad\Model\Void\BooleanModel;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=PUT-api-v2-CashVouchers-id-Exported-exported
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class UpdateCashVoucherExported extends iDokladAbstractFunction
{
    /** @var string $id */
    protected $id;

    /** @var ExportedStateEnum $exported */
    protected $exported;

    /**
     * @param string $id
     * @param int    $exported
     */
    public function __construct(string $id, int $exported)
    {
        $this->id = $id;
        $this->exported = new ExportedStateEnum($exported);
    }

    /**
     * Get iDokladModelInterface class.
     *
     * @see iDokladModelInterface
     *
     * @return string
     */
    public function getModelClass(): string
    {
        return BooleanModel::class;
    }

    /**
     * GET|POST|PUT|DELETE e.g.
     *
     * @see iDoklad::request()
     *
     * @return string
     */
    public function getHttpMethod(): string
    {
        return 'PUT';
    }

    /**
     * Return base URI, e.g. /invoices; /invoice/1/edit and so on.
     *
     * @see iDoklad::call()
     *
     * @return string
     */
    public function getUri(): string
    {
        return sprintf(
            'CashVouchers/%s/Exported/%s',
            $this->id,
            $this->exported->getValue()
        );
    }

    /**
     * Vrátí seznam parametrů, které se předají GuzzleHttp\Client.
     *
     * @see \GuzzleHttp\Client::request()
     * @see iDoklad::call()
     *
     * @return array
     */
    public function getGuzzleOptions(): array
    {
        return [];
    }
}

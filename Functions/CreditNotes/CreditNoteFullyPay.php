<?php

namespace Fousky\Component\iDoklad\Functions\CreditNotes;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\Void\BooleanModel;

/**
 * @see https://app.idoklad.cz/developer/Help/v2/cs/Api?apiId=PUT-api-v2-CreditNotes-id-FullyPay_dateOfPayment_salesPosEquipmentId
 *
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CreditNoteFullyPay extends iDokladAbstractFunction
{
    /** @var string $id */
    protected $id;

    /** @var array $urlParts */
    protected $urlParts = [];

    /**
     * @param string         $id
     * @param null|\DateTime $dateOfPayment
     * @param null|int       $salesPosEquipmentId
     */
    public function __construct(string $id, \DateTime $dateOfPayment = null, int $salesPosEquipmentId = null)
    {
        $this->id = $id;

        if ($dateOfPayment) {
            $this->urlParts['dateOfPayment'] = $dateOfPayment->format('Y-m-d H:i:s');
        }

        if ($salesPosEquipmentId) {
            $this->urlParts['salesPosEquipmentId'] = $salesPosEquipmentId;
        }
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
        $url = sprintf('CreditNotes/%s/FullyPay', $this->id);

        if (count($this->urlParts) > 0) {
            $url .= '?'.http_build_query($this->urlParts);
        }

        return $url;
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

<?php

namespace Fousky\Component\iDoklad\Functions\CashVoucher;

use Fousky\Component\iDoklad\Functions\iDokladAbstractFunction;
use Fousky\Component\iDoklad\Model\CashVoucher\CashVoucherApiModel;
use Fousky\Component\iDoklad\Model\CashVoucher\CashVoucherApiModelInsert;
use Fousky\Component\iDoklad\Model\CashVoucher\CashVoucherItemApiModelInsert;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CreateCashVoucher extends iDokladAbstractFunction
{
    /** @var CashVoucherApiModelInsert $data */
    protected $data;

    /**
     * @param CashVoucherApiModelInsert $data
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(CashVoucherApiModelInsert $data)
    {
        $this->data = $data;

        $this->validate($data);
    }

    /**
     * @param CashVoucherApiModelInsert $data
     *
     * @throws \InvalidArgumentException
     */
    protected function validate(CashVoucherApiModelInsert $data)
    {
        if ($data->getItem() === null) {
            throw new \InvalidArgumentException(sprintf(
                'Class %s must contains property $Item',
                CashVoucherApiModelInsert::class
            ));
        }

        if (empty($data->getItem()->Name)) {
            throw new \InvalidArgumentException(sprintf(
                'Property $Name of class %s cannot be empty.',
                CashVoucherItemApiModelInsert::class
            ));
        }

        if (empty($data->getItem()->Price)) {
            throw new \InvalidArgumentException(sprintf(
                'Property $Price of class %s cannot be empty.',
                CashVoucherItemApiModelInsert::class
            ));
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
        return CashVoucherApiModel::class;
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
        return 'POST';
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
        return 'CashVouchers';
    }

    /**
     * Vrátí seznam parametrů, které se předají GuzzleHttp\Client
     *
     * @see \GuzzleHttp\Client::request()
     * @see iDoklad::call()
     *
     * @return array
     * @throws \ReflectionException
     * @throws \InvalidArgumentException
     */
    public function getGuzzleOptions(): array
    {
        return [
            'json' => $this->data->toArray(),
        ];
    }
}

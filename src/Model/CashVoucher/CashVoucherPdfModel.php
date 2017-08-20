<?php

namespace Fousky\Component\iDoklad\Model\CashVoucher;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CashVoucherPdfModel extends iDokladAbstractModel
{
    /** @var null|string $pdf Raw Base64 ALREADY DECODED data. */
    public $pdf;

    /**
     * @param ResponseInterface $response
     *
     * @return iDokladModelInterface
     */
    public static function createFromResponse(ResponseInterface $response): iDokladModelInterface
    {
        $raw = $response->getBody()->getContents();

        $model = new static();
        $model->pdf = base64_decode($raw);

        return $model;
    }

    /**
     * @param string $fileName
     *
     * @return bool If saving was successfully
     */
    public function save(string $fileName): bool
    {
        return file_put_contents($fileName, $this->pdf) !== false;
    }
}

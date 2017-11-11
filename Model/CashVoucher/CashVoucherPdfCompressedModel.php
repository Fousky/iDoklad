<?php

namespace Fousky\Component\iDoklad\Model\CashVoucher;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class CashVoucherPdfCompressedModel extends iDokladAbstractModel
{
    /** @var null|string $zip Raw Base64 ALREADY DECODED data. */
    public $zip;

    /**
     * @param ResponseInterface $response
     *
     * @return iDokladModelInterface
     */
    public static function createFromResponse(ResponseInterface $response): iDokladModelInterface
    {
        $raw = $response->getBody()->getContents();

        $model = new static();
        $model->zip = base64_decode($raw);

        return $model;
    }

    /**
     * @param string $fileName absolute path to ZIP file to be saved
     *
     * @return bool If saving was successfully
     */
    public function save(string $fileName): bool
    {
        return false !== file_put_contents($fileName, $this->zip);
    }
}

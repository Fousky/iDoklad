<?php

namespace Fousky\Component\iDoklad\Model\SalesReceipts;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class SalesReceiptPdfStringModel extends iDokladAbstractModel
{
    /**
     * @var string base64 encoded PDF content
     */
    public $raw;

    /**
     * @param ResponseInterface $response
     *
     * @return iDokladModelInterface
     *
     * @throws \RuntimeException
     */
    public static function createFromResponse(ResponseInterface $response): iDokladModelInterface
    {
        $model = new static();
        $model->raw = $response->getBody()->getContents();

        return $model;
    }

    /**
     * @param string $filepath
     *
     * @return bool if was successfully saved
     */
    public function save(string $filepath): bool
    {
        return false !== file_put_contents($filepath, base64_decode($this->raw));
    }
}

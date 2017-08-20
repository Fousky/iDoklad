<?php

namespace Fousky\Component\iDoklad\Model\ProformaInvoices;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ProformaPdfStringModel extends iDokladAbstractModel
{
    /**
     * @var string Base64 encoded PDF content.
     */
    public $raw;

    /**
     * @param ResponseInterface $response
     *
     * @return iDokladModelInterface
     */
    public static function createFromResponse(ResponseInterface $response): iDokladModelInterface
    {
        $model = new static();
        $model->raw = (string) $response->getBody()->getContents();

        return $model;
    }

    /**
     * @param string $file
     *
     * @return bool If was successfully saved.
     */
    public function save(string $file): bool
    {
        return file_put_contents($file, base64_decode($this->raw)) !== false;
    }
}

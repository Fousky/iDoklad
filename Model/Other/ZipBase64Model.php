<?php

namespace Fousky\Component\iDoklad\Model\Other;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class ZipBase64Model extends iDokladAbstractModel
{
    /**
     * @var string base64 encoded ZIP content
     */
    public $raw;

    /**
     * @param ResponseInterface $response
     *
     * @return iDokladModelInterface
     * @throws \RuntimeException
     */
    public static function createFromResponse(ResponseInterface $response): iDokladModelInterface
    {
        $model = new static();
        $model->raw = $response->getBody()->getContents();

        return $model;
    }

    /**
     * @param string $file
     *
     * @return bool if was successfully saved
     */
    public function save(string $file): bool
    {
        return false !== file_put_contents($file, base64_decode($this->raw));
    }
}

<?php

namespace Fousky\Component\iDoklad\Model\Other;

use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class UnknownFileModel extends iDokladAbstractModel
{
    /**
     * RAW content of file (should be saved to disc with some filename+extension).
     *
     * @var string
     */
    protected $content;

    /**
     * MIME-type detected of raw content. You can check extension by this MIME.
     *
     * @var string
     */
    protected $mime;

    /**
     * @throws \RuntimeException
     */
    public function __construct()
    {
        if (!function_exists('mime_content_type')) {
            throw new \RuntimeException('Function `mime_content_type` does not exists, please install PHP extension `fileinfo` (php_fileinfo.so or php_fileinfo.dll).');
        }
    }

    /**
     * @param ResponseInterface $response
     *
     * @throws \Exception
     *
     * @return iDokladModelInterface
     */
    public static function createFromResponse(ResponseInterface $response): iDokladModelInterface
    {
        return (new static())->init((string) $response->getBody()->getContents());
    }

    /**
     * @param string $raw
     *
     * @throws \Exception
     *
     * @return iDokladModelInterface
     */
    public function init(string $raw): iDokladModelInterface
    {
        $this->content = base64_decode($raw);

        $temp = sprintf('%s/%s', sys_get_temp_dir(), bin2hex(random_bytes(10)));
        file_put_contents($temp, $this->content);

        $this->mime = mime_content_type($temp);
        @unlink($temp);

        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getMime(): string
    {
        return $this->mime;
    }
}

<?php

namespace Fousky\Component\iDoklad\Storage;

use Fousky\Component\iDoklad\Exception\TokenNotFoundException;
use Fousky\Component\iDoklad\Model\Auth\AccessToken;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class AccessTokenFileStorage implements AccessTokenStorageInterface
{
    /** @var string $file */
    protected $file;

    /** @var AccessToken|null $token */
    protected $token;

    /**
     * @param string $file
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * Has storage token?
     *
     * @return bool
     */
    public function hasToken(): bool
    {
        if ($this->token instanceof AccessToken) {
            return true;
        }

        $this->token = null;

        if (!file_exists($this->file) || !is_readable($this->file)) {
            return false;
        }

        try {
            $token = unserialize(
                file_get_contents($this->file),
                [
                    'allowed_classes' => AccessToken::class,
                ]
            );

            if ($token instanceof AccessToken) {
                $this->token = $token;

                return true;
            }
        } catch (\Throwable $e) {
            return false;
        }

        return false;
    }

    /**
     * Get AccessToken from Storage or throw TokenNotFoundException if not found.
     *
     * @throws TokenNotFoundException
     *
     * @return AccessToken
     */
    public function getToken(): AccessToken
    {
        if (null === $this->token || !$this->hasToken()) {
            throw new TokenNotFoundException();
        }

        return $this->token;
    }

    /**
     * Set AccessToken to the Storage object.
     *
     * @param AccessToken $token
     *
     * @throws \Symfony\Component\Filesystem\Exception\IOException
     */
    public function setToken(AccessToken $token)
    {
        (new Filesystem())->dumpFile($this->file, serialize($token));

        $this->token = $token;
    }

    /**
     * Abandon AccessToken.
     *
     * @throws \Symfony\Component\Filesystem\Exception\IOException
     */
    public function abandonToken()
    {
        (new Filesystem())->remove($this->file);

        $this->token = null;
    }

    /**
     * Is AccessToken expired?
     *
     * @return bool
     */
    public function isTokenExpired(): bool
    {
        try {
            $token = $this->getToken();

            if (!$token instanceof AccessToken) {
                return true;
            }

            return $token->isExpired();
        } catch (\Throwable $e) {
            return true;
        }
    }
}

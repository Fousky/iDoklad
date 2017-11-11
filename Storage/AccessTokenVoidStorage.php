<?php

namespace Fousky\Component\iDoklad\Storage;

use Fousky\Component\iDoklad\Exception\TokenNotFoundException;
use Fousky\Component\iDoklad\Model\Auth\AccessToken;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class AccessTokenVoidStorage implements AccessTokenStorageInterface
{
    protected $token;

    /**
     * Has storage token?
     *
     * @return bool
     */
    public function hasToken(): bool
    {
        return null !== $this->token;
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
        if ($this->hasToken()) {
            return $this->token;
        }

        throw new TokenNotFoundException();
    }

    /**
     * Set AccessToken to the Storage object.
     *
     * @param AccessToken $token
     */
    public function setToken(AccessToken $token)
    {
        $this->token = $token;
    }

    /**
     * Abandon AccessToken.
     */
    public function abandonToken()
    {
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

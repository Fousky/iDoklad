<?php

namespace Fousky\Component\iDoklad\Storage;

use Fousky\Component\iDoklad\Exception\TokenNotFoundException;
use Fousky\Component\iDoklad\Model\Auth\AccessToken;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
interface AccessTokenStorageInterface
{
    /**
     * Has storage token?
     *
     * @return bool
     */
    public function hasToken(): bool;

    /**
     * Get AccessToken from Storage or throw TokenNotFoundException if not found.
     *
     * @throws TokenNotFoundException
     *
     * @return AccessToken
     */
    public function getToken(): AccessToken;

    /**
     * Set AccessToken to the Storage object.
     *
     * @param AccessToken $token
     */
    public function setToken(AccessToken $token);

    /**
     * Abandon AccessToken.
     */
    public function abandonToken();

    /**
     * Is AccessToken expired?
     *
     * @return bool
     */
    public function isTokenExpired(): bool;
}

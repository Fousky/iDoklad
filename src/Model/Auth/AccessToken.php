<?php

namespace Fousky\Component\iDoklad\Model\Auth;

use Fousky\Component\iDoklad\Util\ResponseUtil;
use Psr\Http\Message\ResponseInterface;
use Fousky\Component\iDoklad\Exception\InvalidResponseException;
use Fousky\Component\iDoklad\Model\iDokladAbstractModel;
use Fousky\Component\iDoklad\Model\iDokladModelInterface;

/**
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
class AccessToken extends iDokladAbstractModel implements \Serializable
{
    /** @var string $token */
    protected $token;

    /** @var int $expires */
    protected $expires;

    /** @var string $type */
    protected $type;

    /** @var \DateTime $requestedAt */
    protected $requestedAt;

    /**
     * @param string $token Access token string.
     * @param int $expires Expires in seconds.
     * @param string $type Access token type.
     * @param \DateTime $requestedAt Token requested at some time.
     */
    public function __construct(
        string $token,
        int $expires,
        string $type,
        \DateTime $requestedAt
    ) {
        $this->token = $token;
        $this->expires = $expires;
        $this->type = $type;
        $this->requestedAt = $requestedAt;
    }

    /**
     * @param array $data
     *
     * @return AccessToken
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): AccessToken
    {
        if (!array_key_exists('token', $data) ||
            !array_key_exists('expires', $data) ||
            !array_key_exists('type', $data) ||
            !array_key_exists('requestedAt', $data)
        ) {
            throw new \InvalidArgumentException(sprintf('Invalid argument 1 \$data for %s', __METHOD__));
        }

        return new AccessToken(
            $data['token'],
            $data['expires'],
            $data['type'],
            \DateTime::createFromFormat('Y-m-d H:i:s', $data['requestedAt'])
        );
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return int
     */
    public function getExpires(): int
    {
        return $this->expires;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isExpired(): bool
    {
        return new \DateTime() > (clone $this->requestedAt)->modify(sprintf('+%d second', $this->expires));
    }

    /**
     * @return string
     */
    public function serialize(): string
    {
        return serialize([
            $this->token,
            $this->expires,
            $this->type,
            $this->requestedAt,
        ]);
    }

    /**
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        list(
            $this->token,
            $this->expires,
            $this->type,
            $this->requestedAt
        ) = unserialize($serialized, ['allowed_classes' => AccessToken::class]);
    }

    /**
     * @param ResponseInterface $response
     *
     * @return iDokladModelInterface
     * @throws InvalidResponseException
     * @throws \RuntimeException
     */
    public static function createFromResponse(ResponseInterface $response): iDokladModelInterface
    {
        $result = (array) ResponseUtil::handle($response);

        if (!is_array($result) ||
            !array_key_exists('access_token', $result) ||
            !array_key_exists('expires_in', $result) ||
            !array_key_exists('token_type', $result)
        ) {
            throw new InvalidResponseException();
        }

        return new static(
            $result['access_token'],
            $result['expires_in'],
            $result['token_type'],
            new \DateTime()
        );
    }
}

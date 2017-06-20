<?php

namespace Fousky\Component\iDoklad\Doctrine\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
trait iDokladIdTrait
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="idoklad_id", type="string", nullable=true)
     */
    protected $idokladId;

    /**
     * @return null|string
     */
    public function getIdokladId()
    {
        return $this->idokladId;
    }

    /**
     * @return bool
     */
    public function hasIdokladId(): bool
    {
        return $this->idokladId !== null;
    }

    /**
     * @param null|string $idokladId
     *
     * @return $this
     */
    public function setIdokladId($idokladId)
    {
        $this->idokladId = $idokladId;

        return $this;
    }
}

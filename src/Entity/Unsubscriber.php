<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UnsubscriberRepository")
 */
class Unsubscriber
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hashed_email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $offerId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $spsr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $isp;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $unsub_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getHashedEmail(): ?string
    {
        return $this->hashed_email;
    }

    public function setHashedEmail(string $hashed_email): self
    {
        $this->hashed_email = $hashed_email;

        return $this;
    }

    public function getOfferId(): ?string
    {
        return $this->offerId;
    }

    public function setOfferId(?string $offerId): self
    {
        $this->offerId = $offerId;

        return $this;
    }

    public function getSpsr(): ?string
    {
        return $this->spsr;
    }

    public function setSpsr(?string $spsr): self
    {
        $this->spsr = $spsr;

        return $this;
    }

    public function getIsp(): ?string
    {
        return $this->isp;
    }

    public function setIsp(?string $isp): self
    {
        $this->isp = $isp;

        return $this;
    }

    public function getUnsubAt(): ?\DateTimeInterface
    {
        return $this->unsub_at;
    }

    public function setUnsubAt(?\DateTimeInterface $unsub_at): self
    {
        $this->unsub_at = $unsub_at;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\AwardRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AwardRepository::class)
 */
class Award
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $company;

    /**
     * @ORM\Column(type="datetime")
     */
    private $recievedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getRecievedAt(): ?\DateTimeInterface
    {
        return $this->recievedAt;
    }

    public function setRecievedAt(\DateTimeInterface $recievedAt): self
    {
        $this->recievedAt = $recievedAt;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\PubliciteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PubliciteRepository::class)
 */
class Publicite
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
    private $text;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Admin::class, inversedBy="publicites")
     */
    private $admin;

    /**
     * @ORM\ManyToOne(targetEntity=Remorquage::class, inversedBy="publicites")
     */
    private $remorquage;

    /**
     * @ORM\ManyToOne(targetEntity=Mecancien::class, inversedBy="publicites")
     */
    private $mecancien;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getAdmin(): ?Admin
    {
        return $this->admin;
    }

    public function setAdmin(?Admin $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    public function getRemorquage(): ?Remorquage
    {
        return $this->remorquage;
    }

    public function setRemorquage(?Remorquage $remorquage): self
    {
        $this->remorquage = $remorquage;

        return $this;
    }

    public function getMecancien(): ?Mecancien
    {
        return $this->mecancien;
    }

    public function setMecancien(?Mecancien $mecancien): self
    {
        $this->mecancien = $mecancien;

        return $this;
    }
}

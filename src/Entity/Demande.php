<?php

namespace App\Entity;

use App\Repository\DemandeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DemandeRepository::class)
 */
class Demande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateajout;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typevoiture;

    /**
     * @ORM\Column(type="float")
     */
    private $altitude;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude;

   

    /**
     * @ORM\ManyToOne(targetEntity=Service::class, inversedBy="demandes")
     */
    private $service;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateajout(): ?\DateTimeInterface
    {
        return $this->dateajout;
    }

    public function setDateajout(\DateTimeInterface $dateajout): self
    {
        $this->dateajout = $dateajout;

        return $this;
    }

    public function getTypevoiture(): ?string
    {
        return $this->typevoiture;
    }

    public function setTypevoiture(string $typevoiture): self
    {
        $this->typevoiture = $typevoiture;

        return $this;
    }

    public function getAltitude(): ?float
    {
        return $this->altitude;
    }

    public function setAltitude(float $altitude): self
    {
        $this->altitude = $altitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;

        return $this;
    }
}

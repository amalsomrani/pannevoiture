<?php

namespace App\Entity;

use App\Repository\DemandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="float")
     */
    private $longitude;

    /**
     * @ORM\Column(type="float")
     */
    private $altitude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typevoiture;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="demandes")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Panne::class, inversedBy="demandes")
     */
    private $panne;

    /**
     * @ORM\OneToMany(targetEntity=Service::class, mappedBy="demande")
     */
    private $service;

    public function __construct()
    {
        $this->service = new ArrayCollection();
    }

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

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

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

    public function getTypevoiture(): ?string
    {
        return $this->typevoiture;
    }

    public function setTypevoiture(string $typevoiture): self
    {
        $this->typevoiture = $typevoiture;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPanne(): ?Panne
    {
        return $this->panne;
    }

    public function setPanne(?Panne $panne): self
    {
        $this->panne = $panne;

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getService(): Collection
    {
        return $this->service;
    }

    public function addService(Service $service): self
    {
        if (!$this->service->contains($service)) {
            $this->service[] = $service;
            $service->setDemande($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->service->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getDemande() === $this) {
                $service->setDemande(null);
            }
        }

        return $this;
    }
    public function __toString() 
    {
    return (string) $this->longitude; 
    }
}

<?php

namespace App\Entity;

use App\Repository\MecancienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MecancienRepository::class)
 */
class Mecancien
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone;

   

    /**
     * @ORM\ManyToOne(targetEntity=Admin::class, inversedBy="mecanciens")
     */
    private $admin;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Publicite::class, mappedBy="mecancien")
     */
    private $publicites;

    /**
     * @ORM\ManyToOne(targetEntity=Service::class, inversedBy="mecancien")
     */
    private $service;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zoneintervention;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $joursdetravail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $profession;


    

    public function __construct()
    {
        $this->publicites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Publicite[]
     */
    public function getPublicites(): Collection
    {
        return $this->publicites;
    }

    public function addPublicite(Publicite $publicite): self
    {
        if (!$this->publicites->contains($publicite)) {
            $this->publicites[] = $publicite;
            $publicite->setMecancien($this);
        }

        return $this;
    }

    public function removePublicite(Publicite $publicite): self
    {
        if ($this->publicites->removeElement($publicite)) {
            // set the owning side to null (unless already changed)
            if ($publicite->getMecancien() === $this) {
                $publicite->setMecancien(null);
            }
        }

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

    public function getZoneintervention(): ?string
    {
        return $this->zoneintervention;
    }

    public function setZoneintervention(string $zoneintervention): self
    {
        $this->zoneintervention = $zoneintervention;

        return $this;
    }

    public function getJoursdetravail(): ?string
    {
        return $this->joursdetravail;
    }

    public function setJoursdetravail(string $joursdetravail): self
    {
        $this->joursdetravail = $joursdetravail;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }
    public function __toString() {
        return $this->nom;
    }
}

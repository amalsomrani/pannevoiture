<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\OneToMany(targetEntity=Remorquage::class, mappedBy="service")
     */
    private $remorquage;

    /**
     * @ORM\OneToMany(targetEntity=Mecancien::class, mappedBy="service")
     */
    private $mecancien;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="service")
     */
    private $commentaires;

    /**
     * @ORM\ManyToOne(targetEntity=Demande::class, inversedBy="service")
     */
    private $demande;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    public function __construct()
    {
        $this->remorquage = new ArrayCollection();
        $this->mecancien = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Remorquage[]
     */
    public function getRemorquage(): Collection
    {
        return $this->remorquage;
    }

    public function addRemorquage(Remorquage $remorquage): self
    {
        if (!$this->remorquage->contains($remorquage)) {
            $this->remorquage[] = $remorquage;
            $remorquage->setService($this);
        }

        return $this;
    }

    public function removeRemorquage(Remorquage $remorquage): self
    {
        if ($this->remorquage->removeElement($remorquage)) {
            // set the owning side to null (unless already changed)
            if ($remorquage->getService() === $this) {
                $remorquage->setService(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Mecancien[]
     */
    public function getMecancien(): Collection
    {
        return $this->mecancien;
    }

    public function addMecancien(Mecancien $mecancien): self
    {
        if (!$this->mecancien->contains($mecancien)) {
            $this->mecancien[] = $mecancien;
            $mecancien->setService($this);
        }

        return $this;
    }

    public function removeMecancien(Mecancien $mecancien): self
    {
        if ($this->mecancien->removeElement($mecancien)) {
            // set the owning side to null (unless already changed)
            if ($mecancien->getService() === $this) {
                $mecancien->setService(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setService($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getService() === $this) {
                $commentaire->setService(null);
            }
        }

        return $this;
    }

    public function getDemande(): ?Demande
    {
        return $this->demande;
    }

    public function setDemande(Demande $demande): self
    {
        $this->demande = $demande;

        return $this;
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
  
    public function __toString() {
        if(is_null($this->nom)) {
            return 'NULL';
        }
        return $this->nom;
    }
   
}
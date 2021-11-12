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
     * @ORM\OneToMany(targetEntity=Mecancien::class, mappedBy="service")
     */
    private $macancien;

    /**
     * @ORM\OneToMany(targetEntity=Remorquage::class, mappedBy="service")
     */
    private $remorquage;

    /**
     * @ORM\OneToMany(targetEntity=Demande::class, mappedBy="service")
     */
    private $demandes;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="service")
     */
    private $commentaires;

    public function __construct()
    {
        $this->macancien = new ArrayCollection();
        $this->remorquage = new ArrayCollection();
        $this->demandes = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Mecancien[]
     */
    public function getMacancien(): Collection
    {
        return $this->macancien;
    }

    public function addMacancien(Mecancien $macancien): self
    {
        if (!$this->macancien->contains($macancien)) {
            $this->macancien[] = $macancien;
            $macancien->setService($this);
        }

        return $this;
    }

    public function removeMacancien(Mecancien $macancien): self
    {
        if ($this->macancien->removeElement($macancien)) {
            // set the owning side to null (unless already changed)
            if ($macancien->getService() === $this) {
                $macancien->setService(null);
            }
        }

        return $this;
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
     * @return Collection|Demande[]
     */
    public function getDemandes(): Collection
    {
        return $this->demandes;
    }

    public function addDemande(Demande $demande): self
    {
        if (!$this->demandes->contains($demande)) {
            $this->demandes[] = $demande;
            $demande->setService($this);
        }

        return $this;
    }

    public function removeDemande(Demande $demande): self
    {
        if ($this->demandes->removeElement($demande)) {
            // set the owning side to null (unless already changed)
            if ($demande->getService() === $this) {
                $demande->setService(null);
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
}

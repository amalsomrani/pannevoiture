<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 */
class Admin
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
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    /**
     * @ORM\OneToMany(targetEntity=Remorquage::class, mappedBy="admin")
     */
    private $remorquages;

    /**
     * @ORM\OneToMany(targetEntity=Mecancien::class, mappedBy="admin")
     */
    private $mecanciens;

    /**
     * @ORM\OneToMany(targetEntity=Publicite::class, mappedBy="admin")
     */
    private $publicites;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="admin")
     */
    private $commentaires;

    public function __construct()
    {
        $this->remorquages = new ArrayCollection();
        $this->mecanciens = new ArrayCollection();
        $this->publicites = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection|Remorquage[]
     */
    public function getRemorquages(): Collection
    {
        return $this->remorquages;
    }

    public function addRemorquage(Remorquage $remorquage): self
    {
        if (!$this->remorquages->contains($remorquage)) {
            $this->remorquages[] = $remorquage;
            $remorquage->setAdmin($this);
        }

        return $this;
    }

    public function removeRemorquage(Remorquage $remorquage): self
    {
        if ($this->remorquages->removeElement($remorquage)) {
            // set the owning side to null (unless already changed)
            if ($remorquage->getAdmin() === $this) {
                $remorquage->setAdmin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Mecancien[]
     */
    public function getMecanciens(): Collection
    {
        return $this->mecanciens;
    }

    public function addMecancien(Mecancien $mecancien): self
    {
        if (!$this->mecanciens->contains($mecancien)) {
            $this->mecanciens[] = $mecancien;
            $mecancien->setAdmin($this);
        }

        return $this;
    }

    public function removeMecancien(Mecancien $mecancien): self
    {
        if ($this->mecanciens->removeElement($mecancien)) {
            // set the owning side to null (unless already changed)
            if ($mecancien->getAdmin() === $this) {
                $mecancien->setAdmin(null);
            }
        }

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
            $publicite->setAdmin($this);
        }

        return $this;
    }

    public function removePublicite(Publicite $publicite): self
    {
        if ($this->publicites->removeElement($publicite)) {
            // set the owning side to null (unless already changed)
            if ($publicite->getAdmin() === $this) {
                $publicite->setAdmin(null);
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
            $commentaire->setAdmin($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getAdmin() === $this) {
                $commentaire->setAdmin(null);
            }
        }

        return $this;
    }
}

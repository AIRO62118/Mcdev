<?php

namespace App\Entity;

use App\Repository\ProfilRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfilRepository::class)]
class Profil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text', nullable: true)]
    private $biographie_profil;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $photo_profil;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $banniere_profil;

    #[ORM\OneToOne(inversedBy: 'profil', targetEntity: User::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBiographieProfil(): ?string
    {
        return $this->biographie_profil;
    }

    public function setBiographieProfil(?string $biographie_profil): self
    {
        $this->biographie_profil = $biographie_profil;

        return $this;
    }

    public function getPhotoProfil(): ?string
    {
        return $this->photo_profil;
    }

    public function setPhotoProfil(?string $photo_profil): self
    {
        $this->photo_profil = $photo_profil;

        return $this;
    }

    public function getBanniereProfil(): ?string
    {
        return $this->banniere_profil;
    }

    public function setBanniereProfil(?string $banniere_profil): self
    {
        $this->banniere_profil = $banniere_profil;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}

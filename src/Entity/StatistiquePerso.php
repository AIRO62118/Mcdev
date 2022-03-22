<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StatistiquePersoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatistiquePersoRepository::class)]
#[ApiResource]
class StatistiquePerso
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $nb_demande;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'statistiquePersos')]
    private $User;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbDemande(): ?int
    {
        return $this->nb_demande;
    }

    public function setNbDemande(int $nb_demande): self
    {
        $this->nb_demande = $nb_demande;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

  
}

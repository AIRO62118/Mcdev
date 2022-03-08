<?php

namespace App\Entity;

use App\Repository\RechercherRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RechercherRepository::class)]
class Rechercher
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $salaire;

    #[ORM\Column(type: 'string', length: 255)]
    private $niveau_demande;

    #[ORM\ManyToOne(targetEntity: Competence::class, inversedBy: 'recherchers')]
    #[ORM\JoinColumn(nullable: false)]
    private $competence;

    #[ORM\ManyToOne(targetEntity: Entreprise::class, inversedBy: 'recherchers')]
    #[ORM\JoinColumn(nullable: false)]
    private $entreprise;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSalaire(): ?string
    {
        return $this->salaire;
    }

    public function setSalaire(string $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getNiveauDemande(): ?string
    {
        return $this->niveau_demande;
    }

    public function setNiveauDemande(string $niveau_demande): self
    {
        $this->niveau_demande = $niveau_demande;

        return $this;
    }

    public function getCompetence(): ?Competence
    {
        return $this->competence;
    }

    public function setCompetence(?Competence $competence): self
    {
        $this->competence = $competence;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }
}

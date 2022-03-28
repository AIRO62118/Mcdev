<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\InteresserRepository;
use Doctrine\ORM\Mapping as ORM;


use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

#[ORM\Entity(repositoryClass: InteresserRepository::class)]
#[ApiResource(normalizationContext:['groups' => ['read'],'enable_max_depth'=>'true'])]
class Interesser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'interessers')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["read"])]
    /**
    * @MaxDepth(1)
    **/
    private $user;

    #[ORM\ManyToOne(targetEntity: Entreprise::class, inversedBy: 'interessers')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["read"])]
    /**
    * @MaxDepth(1)
    **/
    private $entreprise;

    #[ORM\Column(type: 'datetime')]
    private $dateMisEnFavori;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getDateMisEnFavori(): ?\DateTimeInterface
    {
        return $this->dateMisEnFavori;
    }

    public function setDateMisEnFavori(\DateTimeInterface $dateMisEnFavori): self
    {
        $this->dateMisEnFavori = $dateMisEnFavori;

        return $this;
    }
}

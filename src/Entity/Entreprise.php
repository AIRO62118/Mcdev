<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]

#[ApiResource(normalizationContext:['groups' => ['read']], itemOperations: ["get", "patch"=>["security"=>"is_granted('ROLE_ADMIN') or object == entreprise"]])]
class Entreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_entreprise;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $logo_entreprise;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $banniere_entreprise;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description_entreprise;

    #[ORM\Column(type: 'string', length: 255)]
    private $adresse_ville_e;

    #[ORM\Column(type: 'string', length: 255)]
    private $adresse_region_e;

    #[ORM\Column(type: 'string', length: 255)]
    private $adresse_CPe;

    #[ORM\Column(type: 'boolean',nullable:true)]
    private $est_premium;

    #[ORM\Column(type: 'datetime')]
    private $date_création_page;

    #[ORM\OneToMany(mappedBy: 'est_salarie', targetEntity: User::class)]
    private $users_salarie;

    #[ORM\OneToMany(mappedBy: 'entreprise', targetEntity: Rechercher::class)]
    private $recherchers;

    public function __construct()
    {
        $this->users_salarie = new ArrayCollection();
        $this->recherchers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogoEntreprise(): ?string
    {
        return $this->logo_entreprise;
    }

    public function setLogoEntreprise(?string $logo_entreprise): self
    {
        $this->logo_entreprise = $logo_entreprise;

        return $this;
    }

    public function getBanniereEntreprise(): ?string
    {
        return $this->banniere_entreprise;
    }

    public function setBanniereEntreprise(?string $banniere_entreprise): self
    {
        $this->banniere_entreprise = $banniere_entreprise;

        return $this;
    }

    public function getDescriptionEntreprise(): ?string
    {
        return $this->description_entreprise;
    }

    public function setDescriptionEntreprise(?string $description_entreprise): self
    {
        $this->description_entreprise = $description_entreprise;

        return $this;
    }

    public function getAdresseVilleE(): ?string
    {
        return $this->adresse_ville_e;
    }

    public function setAdresseVilleE(string $adresse_ville_e): self
    {
        $this->adresse_ville_e = $adresse_ville_e;

        return $this;
    }

    public function getAdresseRegionE(): ?string
    {
        return $this->adresse_region_e;
    }

    public function setAdresseRegionE(string $adresse_region_e): self
    {
        $this->adresse_region_e = $adresse_region_e;

        return $this;
    }

    public function getAdresseCPE(): ?string
    {
        return $this->adresse_CPe;
    }

    public function setAdresseCPE(string $adresse_CPe): self
    {
        $this->adresse_CPe = $adresse_CPe;

        return $this;
    }

    public function getEstPremium(): ?bool
    {
        return $this->est_premium;
    }

    public function setEstPremium(bool $est_premium): self
    {
        $this->est_premium = $est_premium;

        return $this;
    }

    public function getDateCréationPage(): ?\DateTimeInterface
    {
        return $this->date_création_page;
    }

    public function setDateCréationPage(\DateTimeInterface $date_création_page): self
    {
        $this->date_création_page = $date_création_page;

        return $this;
    }


    /**
     * @return Collection<int, User>
     */
    public function getUsersSalarie(): Collection
    {
        return $this->users_salarie;
    }

    public function addUsersSalarie(User $usersSalarie): self
    {
        if (!$this->users_salarie->contains($usersSalarie)) {
            $this->users_salarie[] = $usersSalarie;
            $usersSalarie->setEstSalarie($this);
        }

        return $this;
    }

    public function removeUsersSalarie(User $usersSalarie): self
    {
        if ($this->users_salarie->removeElement($usersSalarie)) {
            // set the owning side to null (unless already changed)
            if ($usersSalarie->getEstSalarie() === $this) {
                $usersSalarie->setEstSalarie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Rechercher>
     */
    public function getRecherchers(): Collection
    {
        return $this->recherchers;
    }

    public function addRechercher(Rechercher $rechercher): self
    {
        if (!$this->recherchers->contains($rechercher)) {
            $this->recherchers[] = $rechercher;
            $rechercher->setEntreprise($this);
        }

        return $this;
    }

    public function removeRechercher(Rechercher $rechercher): self
    {
        if ($this->recherchers->removeElement($rechercher)) {
            // set the owning side to null (unless already changed)
            if ($rechercher->getEntreprise() === $this) {
                $rechercher->setEntreprise(null);
            }
        }

        return $this;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nom_entreprise;
    }

    public function setNomEntreprise(string $nom_entreprise): self
    {
        $this->nom_entreprise = $nom_entreprise;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\CompetenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CompetenceRepository::class)]

#[ApiResource(normalizationContext:['groups' => ['read']], itemOperations: ["get", "patch"=>["security"=>"is_granted('ROLE_ADMIN') or object == competence"]])]
class Competence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $libelle;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'competences')]
    private $parent_id;

    #[ORM\OneToMany(mappedBy: 'parent_id', targetEntity: self::class)]
    private $competences;

    #[ORM\OneToMany(mappedBy: 'competence', targetEntity: Posseder::class)]
    private $posseders;

    #[ORM\OneToMany(mappedBy: 'competence', targetEntity: Rechercher::class)]
    private $recherchers;

    #[ORM\OneToMany(mappedBy: 'competence', targetEntity: Domaine::class)]
    private $domaines;

    public function __construct()
    {
        $this->competences = new ArrayCollection();
        $this->posseders = new ArrayCollection();
        $this->recherchers = new ArrayCollection();
        $this->domaines = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getParentId(): ?self
    {
        return $this->parent_id;
    }

    public function setParentId(?self $parent_id): self
    {
        $this->parent_id = $parent_id;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(self $competence): self
    {
        if (!$this->competences->contains($competence)) {
            $this->competences[] = $competence;
            $competence->setParentId($this);
        }

        return $this;
    }

    public function removeCompetence(self $competence): self
    {
        if ($this->competences->removeElement($competence)) {
            // set the owning side to null (unless already changed)
            if ($competence->getParentId() === $this) {
                $competence->setParentId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Posseder>
     */
    public function getPosseders(): Collection
    {
        return $this->posseders;
    }

    public function addPosseder(Posseder $posseder): self
    {
        if (!$this->posseders->contains($posseder)) {
            $this->posseders[] = $posseder;
            $posseder->setCompetence($this);
        }

        return $this;
    }

    public function removePosseder(Posseder $posseder): self
    {
        if ($this->posseders->removeElement($posseder)) {
            // set the owning side to null (unless already changed)
            if ($posseder->getCompetence() === $this) {
                $posseder->setCompetence(null);
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
            $rechercher->setCompetence($this);
        }

        return $this;
    }

    public function removeRechercher(Rechercher $rechercher): self
    {
        if ($this->recherchers->removeElement($rechercher)) {
            // set the owning side to null (unless already changed)
            if ($rechercher->getCompetence() === $this) {
                $rechercher->setCompetence(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Domaine>
     */
    public function getDomaines(): Collection
    {
        return $this->domaines;
    }

    public function addDomaine(Domaine $domaine): self
    {
        if (!$this->domaines->contains($domaine)) {
            $this->domaines[] = $domaine;
            $domaine->setCompetence($this);
        }

        return $this;
    }

    public function removeDomaine(Domaine $domaine): self
    {
        if ($this->domaines->removeElement($domaine)) {
            // set the owning side to null (unless already changed)
            if ($domaine->getCompetence() === $this) {
                $domaine->setCompetence(null);
            }
        }

        return $this;
    }

    
}

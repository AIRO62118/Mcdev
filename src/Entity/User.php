<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]

#[ApiResource(normalizationContext:['groups' => ['read'], 'enable_max_depth'=>'true'], itemOperations: ["get", "patch"=>["security"=>"is_granted('ROLE_ADMIN') or object == user"]])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    #[Groups(["read"])]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\OneToOne(mappedBy: 'user', targetEntity: Profil::class, cascade: ['persist', 'remove'])]
    private $profil;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["read"])]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["read"])]
    private $prenom;

    #[ORM\Column(type: 'date')]
    #[Groups(["read"])]
    private $date_de_naissance;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["read"])]
    private $adresse_region;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["read"])]
    private $adresse_ville;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["read"])]
    private $adresse_CP;

    #[ORM\Column(type: 'boolean',nullable:true)]
    private $est_premium;

    #[ORM\Column(type: 'datetime')]
    #[Groups(["read"])]
    private $date_inscription;

    #[ORM\ManyToOne(targetEntity: Entreprise::class, inversedBy: 'users_salarie')]
    #[Groups(["read"])]
    private $est_salarie;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Posseder::class)]
    /**
    * @MaxDepth(1)
    **/
    private $posseders;

    #[ORM\OneToOne(targetEntity: Entreprise::class, cascade: ['persist', 'remove'])]
    #[Groups(["read"])]
    private $est_patron;

    #[ORM\OneToMany(mappedBy: 'User', targetEntity: StatistiquePerso::class)]
    /**
    * @MaxDepth(1)
    **/
    private $statistiquePersos;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Interesser::class)]
    /**
    * @MaxDepth(1)
    **/
    private $interessers;

    public function __construct()
    {
        $this->posseders = new ArrayCollection();
        $this->statistiquePersos = new ArrayCollection();
        $this->interessers = new ArrayCollection();
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getProfil(): ?Profil
    {
        return $this->profil;
    }

    public function setProfil(Profil $profil): self
    {
        // set the owning side of the relation if necessary
        if ($profil->getUser() !== $this) {
            $profil->setUser($this);
        }

        $this->profil = $profil;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $date_de_naissance): self
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    public function getAdresseRegion(): ?string
    {
        return $this->adresse_region;
    }

    public function setAdresseRegion(string $adresse_region): self
    {
        $this->adresse_region = $adresse_region;

        return $this;
    }

    public function getAdresseVille(): ?string
    {
        return $this->adresse_ville;
    }

    public function setAdresseVille(string $adresse_ville): self
    {
        $this->adresse_ville = $adresse_ville;

        return $this;
    }

    public function getAdresseCP(): ?string
    {
        return $this->adresse_CP;
    }

    public function setAdresseCP(string $adresse_CP): self
    {
        $this->adresse_CP = $adresse_CP;

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

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->date_inscription;
    }

    public function setDateInscription(\DateTimeInterface $date_inscription): self
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }
    

    public function getEstSalarie(): ?Entreprise
    {
        return $this->est_salarie;
    }

    public function setEstSalarie(?Entreprise $est_salarie): self
    {
        $this->est_salarie = $est_salarie;

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
            $posseder->setUser($this);
        }

        return $this;
    }

    public function removePosseder(Posseder $posseder): self
    {
        if ($this->posseders->removeElement($posseder)) {
            // set the owning side to null (unless already changed)
            if ($posseder->getUser() === $this) {
                $posseder->setUser(null);
            }
        }

        return $this;
    }

    public function getEstPatron(): ?Entreprise
    {
        return $this->est_patron;
    }

    public function setEstPatron(?Entreprise $est_patron): self
    {
        $this->est_patron = $est_patron;

        return $this;
    }

    public function getRow(){    
        if($this->est_salarie != null){
            $salarie = $this->est_salarie->getNomEntreprise();
        }else{
            $salarie = "";
        }
        if($this->est_patron != null){
            $patron = $this->est_patron->getNomEntreprise();
        }else{
            $patron = "";
        }
        return array($this->id, $this->email, $salarie, $this->nom, $this->prenom, $this->adresse_region, $this->adresse_ville, $this->adresse_CP, $this->est_premium, $patron);
    }
    
    public function getHeader(){ 
        return array("id", "email", "est_salarie", "nom", "prenom", "adresse_region", "adresse_ville", "adresse_CP", "est_premium", "est_patron");
    }

    /**
     * @return Collection<int, StatistiquePerso>
     */
    public function getStatistiquePersos(): Collection
    {
        return $this->statistiquePersos;
    }

    public function addStatistiquePerso(StatistiquePerso $statistiquePerso): self
    {
        if (!$this->statistiquePersos->contains($statistiquePerso)) {
            $this->statistiquePersos[] = $statistiquePerso;
            $statistiquePerso->setUser($this);
        }

        return $this;
    }

    public function removeStatistiquePerso(StatistiquePerso $statistiquePerso): self
    {
        if ($this->statistiquePersos->removeElement($statistiquePerso)) {
            // set the owning side to null (unless already changed)
            if ($statistiquePerso->getUser() === $this) {
                $statistiquePerso->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Interesser>
     */
    public function getInteressers(): Collection
    {
        return $this->interessers;
    }

    public function addInteresser(Interesser $interesser): self
    {
        if (!$this->interessers->contains($interesser)) {
            $this->interessers[] = $interesser;
            $interesser->setUser($this);
        }

        return $this;
    }

    public function removeInteresser(Interesser $interesser): self
    {
        if ($this->interessers->removeElement($interesser)) {
            // set the owning side to null (unless already changed)
            if ($interesser->getUser() === $this) {
                $interesser->setUser(null);
            }
        }

        return $this;
    }

}

<?php

namespace App\Entity\Users;

use App\Repository\UsersRepo\UtilisateursRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Uid\Uuid;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;



#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: UtilisateursRepository::class)]
#[UniqueEntity('EmailUtilisateur', 'l\'Adresse email dejà exist dans cette application')]
class Utilisateurs implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\Column(type: "uuid", unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\Column(length: 150)]
    #[Assert\NotBlank()]
    private ?string $NomUtilisateur = null;

    #[ORM\Column(length: 200)]
    private ?string $PrenomUtilisateur = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank()]
    private ?string $AdresseUtilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $EmailUtilisateur = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    private ?string $FonctionUtilisateur = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    private ?string $SituationMatriUtils = null;

    #[ORM\Column(length: 10)]
    #[Assert\NotBlank()]
    private ?string $SexeUtilisateur = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotBlank()]
    private ?\DateTime $DateNassUtils = null;

    #[ORM\Column(length: 150)]
    #[Assert\NotBlank()]
    private ?string $LieuNaisUtils = null;

    #[ORM\Column]
    #[Assert\NotBlank()]
    private ?int $AgeUtilisateur = null;

    #[ORM\Column(length: 20)]
    private ?string $CinUtilisateur = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $DateDelivreCinUtils = null;

    #[ORM\Column(length: 100)]
    private ?string $LieuDelivreCinUtils = null;

    #[ORM\Column(length: 50)]
    private ?string $Types = null;

    #[Vich\UploadableField(mapping: 'utilisateurs_profile', fileNameProperty: 'ImageNameUtilisateur')]
    private ?File $ProfileUtilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $ImageNameUtilisateur = null;

    #[ORM\Column(type: 'json')]
    private ?array $Roles = ["ROLE_USER"];

    private ?string $plainPassword = null;

    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\NotBlank()]
    private ?string $password = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?DateTimeImmutable $createdAt;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?DateTimeImmutable $updatedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    #[ORM\PreUpdate]
    public function preUpdate() : void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->NomUtilisateur;
    }

    public function setNomUtilisateur(string $NomUtilisateur): static
    {
        $this->NomUtilisateur = $NomUtilisateur;

        return $this;
    }

    public function getPrenomUtilisateur(): ?string
    {
        return $this->PrenomUtilisateur;
    }

    public function setPrenomUtilisateur(string $PrenomUtilisateur): static
    {
        $this->PrenomUtilisateur = $PrenomUtilisateur;

        return $this;
    }

    public function getAdresseUtilisateur(): ?string
    {
        return $this->AdresseUtilisateur;
    }

    public function setAdresseUtilisateur(string $AdresseUtilisateur): static
    {
        $this->AdresseUtilisateur = $AdresseUtilisateur;

        return $this;
    }

    public function getEmailUtilisateur(): ?string
    {
        return $this->EmailUtilisateur;
    }

    public function setEmailUtilisateur(string $EmailUtilisateur): static
    {
        $this->EmailUtilisateur = $EmailUtilisateur;

        return $this;
    }

    public function getFonctionUtilisateur(): ?string
    {
        return $this->FonctionUtilisateur;
    }

    public function setFonctionUtilisateur(string $FonctionUtilisateur): static
    {
        $this->FonctionUtilisateur = $FonctionUtilisateur;

        return $this;
    }

    public function getSituationMatriUtils(): ?string
    {
        return $this->SituationMatriUtils;
    }

    public function setSituationMatriUtils(string $SituationMatriUtils): static
    {
        $this->SituationMatriUtils = $SituationMatriUtils;

        return $this;
    }

    public function getSexeUtilisateur(): ?string
    {
        return $this->SexeUtilisateur;
    }

    public function setSexeUtilisateur(string $SexeUtilisateur): static
    {
        $this->SexeUtilisateur = $SexeUtilisateur;

        return $this;
    }

    public function getDateNassUtils(): ?\DateTime
    {
        return $this->DateNassUtils;
    }

    public function setDateNassUtils(\DateTime $DateNassUtils): static
    {
        $this->DateNassUtils = $DateNassUtils;

        return $this;
    }

    public function getLieuNaisUtils(): ?string
    {
        return $this->LieuNaisUtils;
    }

    public function setLieuNaisUtils(string $LieuNaisUtils): static
    {
        $this->LieuNaisUtils = $LieuNaisUtils;

        return $this;
    }

    public function getAgeUtilisateur(): ?int
    {
        return $this->AgeUtilisateur;
    }

    public function setAgeUtilisateur(int $AgeUtilisateur): static
    {
        $this->AgeUtilisateur = $AgeUtilisateur;

        return $this;
    }

    public function getCinUtilisateur(): ?string
    {
        return $this->CinUtilisateur;
    }

    public function setCinUtilisateur(string $CinUtilisateur): static
    {
        $this->CinUtilisateur = $CinUtilisateur;

        return $this;
    }

    public function getDateDelivreCinUtils(): ?\DateTime
    {
        return $this->DateDelivreCinUtils;
    }

    public function setDateDelivreCinUtils(\DateTime $DateDelivreCinUtils): static
    {
        $this->DateDelivreCinUtils = $DateDelivreCinUtils;

        return $this;
    }

    public function getLieuDelivreCinUtils(): ?string
    {
        return $this->LieuDelivreCinUtils;
    }

    public function setLieuDelivreCinUtils(string $LieuDelivreCinUtils): static
    {
        $this->LieuDelivreCinUtils = $LieuDelivreCinUtils;

        return $this;
    }

    public function getTypes(): ?string
    {
        return $this->Types;
    }

    public function setTypes(string $Types): static
    {
        $this->Types = $Types;

        return $this;
    }

    public function getProfileUtilisateur(): ?File
    {
        return $this->ProfileUtilisateur;
    }

    public function setProfileUtilisateur(?File $ProfileUtilisateur): static
    {
        $this->ProfileUtilisateur = $ProfileUtilisateur;

        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->Roles ?? [];
        // guarantee every user at least has ROLE_USER
        if (!in_array('ROLE_USER', $roles, true)) {
            $roles[] = 'ROLE_USER';
        }
        return $roles;
    }

    public function setRoles(array $Roles): static
    {
        $this->Roles = $Roles;

        return $this;
    }

    /**
     * Get the value of ImageNameUtilisateur
     */
    public function getImageNameUtilisateur()
    {
        return $this->ImageNameUtilisateur;
    }

    /**
     * Set the value of ImageNameUtilisateur
     *
     * @return  self
     */
    public function setImageNameUtilisateur($ImageNameUtilisateur)
    {
        $this->ImageNameUtilisateur = $ImageNameUtilisateur;

        return $this;
    }

    /**
     * Get the value of plainPassword
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * Set the value of plainPassword
     *
     * @return  self
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of createdAt
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of updatedAt
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @return  self
     */ 
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function eraseCredentials(): void
    {
        $this->plainPassword = null;
    }

    public function getUserIdentifier(): string
    {
        return $this->EmailUtilisateur;
    }
}

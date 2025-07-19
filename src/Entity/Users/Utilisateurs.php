<?php

namespace App\Entity\Users;

use App\Repository\UsersRepo\UtilisateursRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;


#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: UtilisateursRepository::class)]
class Utilisateurs
{
    #[ORM\Id]
    #[ORM\Column(type: "uuid", unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'uuid')]
    #[ORM\Column]
    private ?Uuid $id = null;

    #[ORM\Column(length: 150)]
    private ?string $NomUtilisateur = null;

    #[ORM\Column(length: 200)]
    private ?string $PrenomUtilisateur = null;

    #[ORM\Column(length: 100)]
    private ?string $AdresseUtilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $EmailUtilisateur = null;

    #[ORM\Column(length: 50)]
    private ?string $FonctionUtilisateur = null;

    #[ORM\Column(length: 50)]
    private ?string $SituationMatriUtils = null;

    #[ORM\Column(length: 10)]
    private ?string $SexeUtilisateur = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $DateNassUtils = null;

    #[ORM\Column(length: 150)]
    private ?string $LieuNaisUtils = null;

    #[ORM\Column]
    private ?int $AgeUtilisateur = null;

    #[ORM\Column(length: 20)]
    private ?string $CinUtilisateur = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $DateDelivreCinUtils = null;

    #[ORM\Column(length: 100)]
    private ?string $LieuDelivreCinUtils = null;

    #[ORM\Column(length: 50)]
    private ?string $Types = null;

    #[Vich\UploadableField(mapping: 'utilisateurs_profile', fileNameProperty: 'ImageNameUtilsateur')]
    private ?File $ProfileUtilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $ImageNameUtilsateur = null;

    #[ORM\Column(length: 255)]
    private ?string $Roles = null;

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

    public function getRoles(): ?string
    {
        return $this->Roles;
    }

    public function setRoles(string $Roles): static
    {
        $this->Roles = $Roles;

        return $this;
    }

    /**
     * Get the value of ImageNameUtilsateur
     */ 
    public function getImageNameUtilsateur()
    {
        return $this->ImageNameUtilsateur;
    }

    /**
     * Set the value of ImageNameUtilsateur
     *
     * @return  self
     */ 
    public function setImageNameUtilsateur($ImageNameUtilsateur)
    {
        $this->ImageNameUtilsateur = $ImageNameUtilsateur;

        return $this;
    }
}

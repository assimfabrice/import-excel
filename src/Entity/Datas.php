<?php

namespace App\Entity;

use App\Repository\DatasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DatasRepository::class)
 */
class Datas
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
    private $compteAffaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $compteEvenement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $compteDernierEvenement;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroDeFiche;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelleCivilite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $proprieteActuelDuVehicule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroEtNomDeLaVoie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $complementAdresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephoneDomicile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephonePortable;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephoneJob;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDeMiseEnCirculation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAchat;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDernierEvenement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelleMarque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelleModele;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $version;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $VIN;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $immatriculation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeDeProspect;

    /**
     * @ORM\Column(type="integer")
     */
    private $kilometrage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelleEnergie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vendeurVN;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vendeurVO;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaireDeFacturation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeVNVO;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroDeDossierVN;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $intermediaireDeVente;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateEvenement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $origineEvenement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompteAffaire(): ?string
    {
        return $this->compteAffaire;
    }

    public function setCompteAffaire(string $compteAffaire): self
    {
        $this->compteAffaire = $compteAffaire;

        return $this;
    }

    public function getCompteEvenement(): ?string
    {
        return $this->compteEvenement;
    }

    public function setCompteEvenement(string $compteEvenement): self
    {
        $this->compteEvenement = $compteEvenement;

        return $this;
    }

    public function getNumeroDeFiche(): ?int
    {
        return $this->numeroDeFiche;
    }

    public function setNumeroDeFiche(int $numeroDeFiche): self
    {
        $this->numeroDeFiche = $numeroDeFiche;

        return $this;
    }

    public function getLibelleCivilite(): ?string
    {
        return $this->libelleCivilite;
    }

    public function setLibelleCivilite(?string $libelleCivilite): self
    {
        $this->libelleCivilite = $libelleCivilite;

        return $this;
    }

    public function getProprieteActuelDuVehicule(): ?string
    {
        return $this->proprieteActuelDuVehicule;
    }

    public function setProprieteActuelDuVehicule(?string $proprieteActuelDuVehicule): self
    {
        $this->proprieteActuelDuVehicule = $proprieteActuelDuVehicule;

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

    public function getNumeroEtNomDeLaVoie(): ?string
    {
        return $this->numeroEtNomDeLaVoie;
    }

    public function setNumeroEtNomDeLaVoie(string $numeroEtNomDeLaVoie): self
    {
        $this->numeroEtNomDeLaVoie = $numeroEtNomDeLaVoie;

        return $this;
    }

    public function getComplementAdresse(): ?string
    {
        return $this->complementAdresse;
    }

    public function setComplementAdresse(?string $complementAdresse): self
    {
        $this->complementAdresse = $complementAdresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTelephoneDomicile(): ?string
    {
        return $this->telephoneDomicile;
    }

    public function setTelephoneDomicile(string $telephoneDomicile): self
    {
        $this->telephoneDomicile = $telephoneDomicile;

        return $this;
    }

    public function getTelephonePortable(): ?string
    {
        return $this->telephonePortable;
    }

    public function setTelephonePortable(?string $telephonePortable): self
    {
        $this->telephonePortable = $telephonePortable;

        return $this;
    }

    public function getTelephoneJob(): ?string
    {
        return $this->telephoneJob;
    }

    public function setTelephoneJob(?string $telephoneJob): self
    {
        $this->telephoneJob = $telephoneJob;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDateDeMiseEnCirculation(): ?\DateTimeInterface
    {
        return $this->dateDeMiseEnCirculation;
    }

    public function setDateDeMiseEnCirculation(\DateTimeInterface $dateDeMiseEnCirculation): self
    {
        $this->dateDeMiseEnCirculation = $dateDeMiseEnCirculation;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->dateAchat;
    }

    public function setDateAchat(\DateTimeInterface $dateAchat): self
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    public function getDateDernierEvenement(): ?\DateTimeInterface
    {
        return $this->dateDernierEvenement;
    }

    public function setDateDernierEvenement(\DateTimeInterface $dateDernierEvenement): self
    {
        $this->dateDernierEvenement = $dateDernierEvenement;

        return $this;
    }

    public function getLibelleMarque(): ?string
    {
        return $this->libelleMarque;
    }

    public function setLibelleMarque(string $libelleMarque): self
    {
        $this->libelleMarque = $libelleMarque;

        return $this;
    }

    public function getLibelleModele(): ?string
    {
        return $this->libelleModele;
    }

    public function setLibelleModele(?string $libelleModele): self
    {
        $this->libelleModele = $libelleModele;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getVIN(): ?string
    {
        return $this->VIN;
    }

    public function setVIN(string $VIN): self
    {
        $this->VIN = $VIN;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getTypeDeProspect(): ?string
    {
        return $this->typeDeProspect;
    }

    public function setTypeDeProspect(string $typeDeProspect): self
    {
        $this->typeDeProspect = $typeDeProspect;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(int $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getLibelleEnergie(): ?string
    {
        return $this->libelleEnergie;
    }

    public function setLibelleEnergie(string $libelleEnergie): self
    {
        $this->libelleEnergie = $libelleEnergie;

        return $this;
    }

    
    public function getVendeurVO(): ?string
    {
        return $this->vendeurVO;
    }

    public function setVendeurVO(?string $vendeurVO): self
    {
        $this->vendeurVO = $vendeurVO;

        return $this;
    }

    /**
     * Get the value of vendeurVN
     */
    public function getVendeurVN()
    {
        return $this->vendeurVN;
    }


    /**
     * Set the value of vendeurVN
     */
    public function setVendeurVN($vendeurVN): self
    {
        $this->vendeurVN = $vendeurVN;

        return $this;
    }

    public function getCommentaireDeFacturation(): ?string
    {
        return $this->commentaireDeFacturation;
    }

    public function setCommentaireDeFacturation(?string $commentaireDeFacturation): self
    {
        $this->commentaireDeFacturation = $commentaireDeFacturation;

        return $this;
    }

    public function getTypeVNVO(): ?string
    {
        return $this->typeVNVO;
    }

    public function setTypeVNVO(?string $typeVNVO): self
    {
        $this->typeVNVO = $typeVNVO;

        return $this;
    }

    public function getNumeroDeDossierVN(): ?string
    {
        return $this->numeroDeDossierVN;
    }

    public function setNumeroDeDossierVN(string $numeroDeDossierVN): self
    {
        $this->numeroDeDossierVN = $numeroDeDossierVN;

        return $this;
    }

    public function getIntermediaireDeVente(): ?string
    {
        return $this->intermediaireDeVente;
    }

    public function setIntermediaireDeVente(?string $intermediaireDeVente): self
    {
        $this->intermediaireDeVente = $intermediaireDeVente;

        return $this;
    }

    public function getDateEvenement(): ?\DateTimeInterface
    {
        return $this->dateEvenement;
    }

    public function setDateEvenement(\DateTimeInterface $dateEvenement): self
    {
        $this->dateEvenement = $dateEvenement;

        return $this;
    }

    public function getOrigineEvenement(): ?string
    {
        return $this->origineEvenement;
    }

    public function setOrigineEvenement(string $origineEvenement): self
    {
        $this->origineEvenement = $origineEvenement;

        return $this;
    }

    /**
     * Get the value of compteDernierEvenement
     */
    public function getCompteDernierEvenement()
    {
        return $this->compteDernierEvenement;
    }


    /**
     * Set the value of compteDernierEvenement
     */
    public function setCompteDernierEvenement($compteDernierEvenement): self
    {
        $this->compteDernierEvenement = $compteDernierEvenement;

        return $this;
    }
}

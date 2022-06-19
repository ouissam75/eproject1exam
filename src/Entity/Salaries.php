<?php

namespace App\Entity;

use App\Repository\SalariesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SalariesRepository::class)]
class Salaries
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type : 'string', length: 20)]
    #[Assert\Length(
        min: 3,
        max: 20, 
        minMessage:"Vous devais avoir {{limit}} lettre minimun",
        maxMessage:"Vous pouvez pas avoir plus de {{limit}} lettre" 
    )]
    private $prenom;
    #[ORM\Column(type : 'string', length: 20)]

            #[Assert\Length(
        min: 3,
        max: 20, 
        minMessage:"Vous devais avoir {{limit}} lettre minimun",
        maxMessage:"Vous pouvez pas avoir plus de {{limit}} lettre" 
    )]
    private $nom;

    #[ORM\Column(type: 'string', length: 10, unique: true)]
    #[Assert\Regex(pattern: "/^[0-9]+$/")]
    #[Assert\Length(
        min: 10,
        max: 10,
        exactMessage: "Le numero doit contenir {{limit}} chiffre minum ou maximun."
    )]
    #[Assert\PositiveOrZero]
    #[Assert\LessThan(
        value: 10_00_00_00_00,
        message: "Vuméro invalide."
    )]
    private $telephone;

    //  Vérifications variable email
    #[ORM\Column(type: 'string', length: 50, unique: true)]
    #[Assert\Email(message: "Votre email est invalide")]
    private $email;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Length(
        min: 10,
        max: 255,
        minMessage: "L'adresse doit contenir au minimum {{ limit }} caractères.",
        maxMessage: "L'adresse doit contenir au maximum {{ limit }} caractères."
    )]
    private $adresses;

    #[ORM\Column(type: 'string', length: 30)]
    #[Assert\Length(
        min: 2,
        max: 30,
        minMessage: "Le poste doit contenir au minimum {{ limit }} caractères.",
        maxMessage: "Le poste doit contenir au maximum {{ limit }} caractères."
    )]
    private $poste;

    #[ORM\Column(type: 'string', length: 10)]
    #[Assert\Regex(pattern: "/^[0-9]+$/")]
    #[Assert\Length(
        min: 1,
        max: 10,
        minMessage: "Le salaire doit avoir au minimum {{ limit }} chiffre.",
        maxMessage: "Le salaire doit avoir au maximum {{ limit }} chiffres."
    )]
    #[Assert\PositiveOrZero]
    #[Assert\LessThanOrEqual(
        value: 1_000_000,
        message: "Salaire trop élevé."
    )]
    private $salaire;

    #[ORM\Column(type: 'date')]
    #[Assert\Type(
        type: "datetime",
        message: "{{ value }} invalide."
    )]
    #[Assert\LessThanOrEqual(
        value: "-18 years",
        message: "L'employé doit être majeur."
    )]
    #[Assert\GreaterThanOrEqual(
        value: "-100 years",
        message: "L'employé doit avoir moins de 100 ans."
    )]
    private $datedenaissance;




    public function getId(): ?int
    {
        return $this->id;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }


    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
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

    public function getDatedenaissance(): ?\DateTimeInterface
    {
        return $this->datedenaissance;
    }

    public function setDatedenaissance(\DateTimeInterface $datedenaissance): self
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }
	/**
	 * @return mixed
	 */
	function getAdresses() {
		return $this->adresses;
	}
}

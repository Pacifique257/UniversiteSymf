<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 */
class Etudiant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $matricule;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $ddn;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $genre;

    /**
     * @ORM\Column(type="float")
     */
    private $noteexetat;

    /**
     * @ORM\ManyToMany(targetEntity=Classe::class, mappedBy="etudiants")
     */
    private $classes;

    /**
     * @ORM\OneToMany(targetEntity=Inscription::class, mappedBy="etudiant")
     */
    private $inscriptions;

    public function __construct()
    {
        $this->classes = new ArrayCollection();
        $this->inscriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

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

    public function getDdn(): ?\DateTimeInterface
    {
        return $this->ddn;
    }

    public function setDdn(\DateTimeInterface $ddn): self
    {
        $this->ddn = $ddn;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getNoteexetat(): ?float
    {
        return $this->noteexetat;
    }

    public function setNoteexetat(float $noteexetat): self
    {
        $this->noteexetat = $noteexetat;

        return $this;
    }

    /**
     * @return Collection<int, Classe>
     */
    public function getClasses(): Collection
    {
        return $this->classes;
    }

    public function addClasse(Classe $classe): self
    {
        if (!$this->classes->contains($classe)) {
            $this->classes[] = $classe;
            $classe->addEtudiant($this);
        }

        return $this;
    }

    public function removeClasse(Classe $classe): self
    {
        if ($this->classes->removeElement($classe)) {
            $classe->removeEtudiant($this);
        }

        return $this;
    }

    /**
     * Ajout de la méthode __toString pour convertir l'objet en chaîne de caractères
     */
    public function __toString(): string
    {
        return $this->prenom . ' ' . $this->nom . ' (Matricule: ' . $this->matricule . ')';
    }

    /**
     * @return Collection<int, Inscription>
     */
    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): self
    {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions[] = $inscription;
            $inscription->setEtudiant($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscriptions->removeElement($inscription)) {
            if ($inscription->getEtudiant() === $this) {
                $inscription->setEtudiant(null);
            }
        }

        return $this;
    }
}

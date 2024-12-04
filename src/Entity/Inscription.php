<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InscriptionRepository::class)
 */
class Inscription
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
    private $anneA;

    /**
     * @ORM\ManyToOne(targetEntity=Etudiant::class, inversedBy="inscriptions")
     */
    private $etudiant;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class, inversedBy="inscriptions")
     */
    private $class;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnneA(): ?string
    {
        return $this->anneA;
    }

    public function setAnneA(string $anneA): self
    {
        $this->anneA = $anneA;

        return $this;
    }

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    public function getClass(): ?Classe
    {
        return $this->class;
    }

    public function setClass(?Classe $class): self
    {
        $this->class = $class;

        return $this;
    }

}

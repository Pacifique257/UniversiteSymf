<?php

namespace App\Entity;

use App\Repository\FaculteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FaculteRepository::class)
 */
class Faculte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $nomf;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $coded;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomf(): ?string
    {
        return $this->nomf;
    }

    public function setNomf(string $nomf): self
    {
        $this->nomf = $nomf;

        return $this;
    }

    public function getCoded(): ?string
    {
        return $this->coded;
    }

    public function setCoded(string $coded): self
    {
        $this->coded = $coded;

        return $this;
    }
}

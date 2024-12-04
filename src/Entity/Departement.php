<?php

namespace App\Entity;

use App\Repository\DepartementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartementRepository::class)
 */
class Departement
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
    private $nomd;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $coded;

    /**
     * @ORM\ManyToOne(targetEntity=Faculte::class)
     */
    private $Dep;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomd(): ?string
    {
        return $this->nomd;
    }

    public function setNomd(string $nomd): self
    {
        $this->nomd = $nomd;

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

    public function getDep(): ?Faculte
    {
        return $this->Dep;
    }

    public function setDep(?Faculte $Dep): self
    {
        $this->Dep = $Dep;

        return $this;
    }
}

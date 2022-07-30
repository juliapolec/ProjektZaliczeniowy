<?php

namespace App\Entity;

use App\Repository\GryPlanszoweRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GryPlanszoweRepository::class)]
class GryPlanszowe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nazwa;

    #[ORM\Column(type: 'string', length: 1000)]
    private $opis;

    #[ORM\Column(type: 'boolean')]
    private $uzupelnienie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazwa(): ?string
    {
        return $this->nazwa;
    }

    public function setNazwa(string $nazwa): self
    {
        $this->nazwa = $nazwa;
        return $this;
    }

    public function getOpis(): ?string
    {
        return $this->opis;
    }

    public function setOpis(string $opis): self
    {
        $this->opis = $opis;
        return $this;
    }

    public function isUzupelnienie(): ?bool
    {
        return $this->uzupelnienie;
    }

    public function setUzupelnienie(bool $uzupelnienie): self
    {
        $this->Uzupelnienie = $uzupelnienie;
        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\TeachrRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeachrRepository::class)]
class Teachr
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenom;

    #[ORM\Column(type: 'string', length: 8)]
    private $creation;

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

    public function getCreation(): ?string
    {
        return $this->creation;
    }

    public function setCreation(string $creation): self
    {
        $this->creation = $creation;

        return $this;
    }
}

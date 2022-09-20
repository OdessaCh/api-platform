<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource(mercure: true)]
#[ORM\Entity(repositoryClass: GroupeRepository::class)]
class Groupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'groupes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Hackaton $hackaton = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHackaton(): ?Hackaton
    {
        return $this->hackaton;
    }

    public function setHackaton(?Hackaton $hackaton): self
    {
        $this->hackaton = $hackaton;

        return $this;
    }
}

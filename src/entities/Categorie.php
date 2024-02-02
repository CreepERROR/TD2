<?php

namespace catadoct\catalog\entities;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Doctrine\Common\Collections\Collection;
#[Entity]
#[Table(name: "categorie")]
class Categorie
{
    #[Id]
    #[Column(type: Types::INTEGER)]
    #[GeneratedValue(strategy: "AUTO")]
    public int $id;

    //libelle
    #[Column(name: "libelle", type: Types::TEXT)]
    public string $libelle;

    #[OneToMany(mappedBy: "categorie", targetEntity: Produit::class)]
    public Collection $produits;

//getId
    public function getId(): int
    {
        return $this->id;
    }
//getLibelle
    public function getLibelle(): string
    {
        return $this->libelle;
    }
//getProduits
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    //getCategorie
    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }
}
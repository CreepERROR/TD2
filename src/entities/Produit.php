<?php

namespace catadoct\catalog\entities;
use catadoct\catalog\repositories\ProduitRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)] // Corrected attribute name
#[Table(name: "Produit")]
class Produit
{
    #[Id]
    #[Column(type: Types::INTEGER)]
    #[GeneratedValue(strategy: "AUTO")]
    public int $id;

    #[Column(name:"description", type: Types::TEXT)]
    public string $description;

    //numero
    #[Column(name:"numero",type: Types::INTEGER)]
    public int $numero;

    //libelle
    #[Column(name: "libelle",type: Types::TEXT)]
    public string $libelle;

    //image
    #[Column(name:'image',type: Types::TEXT)]
    public string $image;

    //categorie_id
    #[Column(name: "categorie_id",type: Types::INTEGER)]
    public int $categorieId;

    #[ManyToOne(targetEntity: Categorie::class)]
    #[JoinColumn(name: "categorie_id", referencedColumnName: "id")]
    public ?Categorie $categorie = null;

    #[OneToMany(mappedBy: "produit", targetEntity: Tarif::class)]
    public Collection $tarifs;

//getId
    public function getId(): int
    {
        return $this->id;
    }
//getDescription
    public function getDescription(): string
    {
        return $this->description;
    }
//getNumero
    public function getNumero(): int
    {
        return $this->numero;
    }
//getLibelle
    public function getLibelle(): string
    {
        return $this->libelle;
    }
//getImage
    public function getImage(): string
    {
        return $this->image;
    }
    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }
    //setLibelle
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;
        return $this;
    }
    //set description
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
//set image
    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }
//set numero
    public function setNumero(int $numero): self
    {
        $this->numero = $numero;
        return $this;
    }
//set categorie
    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;
        return $this;
    }
    public function getTarifs(): Collection
    {
        return $this->tarifs;
    }
    //set id
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getCategorieId(): int
    {
        return $this->categorieId;
    }

    public function setCategorieId(int $categorieId): self
    {
        $this->categorieId = $categorieId;
        return $this;
    }

}
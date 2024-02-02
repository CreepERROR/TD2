<?php

namespace catadoct\catalog\entities;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: "tarif")]
class Tarif
{
    #[Id]
    #[Column(type: Types::INTEGER)]
    #[GeneratedValue(strategy: "AUTO")]
    public int $id;


    //tarif
    #[Column(name:"tarif",type: Types::FLOAT)]
    public float $tarif;

    //taille_id
    #[Column(name: "taille_id",type: Types::INTEGER)]
    public int $taille_id;

    //produit_id
    #[Column(name: "produit_id",type: Types::INTEGER)]
    public int $produit_id;

    #[ManyToOne(targetEntity: Produit::class)]
    #[JoinColumn(name: "produit_id", referencedColumnName: "id")]
    public ?Produit $produit = null;

    #[ManyToOne(targetEntity: Taille::class)]
    #[JoinColumn(name: "taille_id", referencedColumnName: "id")]
    public ?Taille $taille = null;

    //getId
    public function getId(): int
    {
        return $this->id;
    }

    //getTarif
    public function getTarif(): float
    {
        return $this->tarif;
    }
}
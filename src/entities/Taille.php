<?php

namespace catadoct\catalog\entities;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: "taille")]
class Taille
{
    #[Id]
    #[Column(type: Types::INTEGER)]
    #[GeneratedValue(strategy: "AUTO")]
    public int $id;

    #[Column( type: Types::TEXT)]
    public string $libelle;

    #[OneToMany(targetEntity: Tarif::class, mappedBy: "taille")]
    public Collection $categories;


}
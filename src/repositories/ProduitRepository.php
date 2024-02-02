<?php

namespace catadoct\catalog\repositories;

use Doctrine\ORM\EntityRepository;

class ProduitRepository extends EntityRepository {

    public function findProductsByCategoryIdWithTarifs($categoryId) {
        $query = $this->createQueryBuilder('p')
            ->join('p.tarifs', 't') // Assurez-vous que la relation tarifs est correctement définie dans votre entité Produit
            ->join('p.categorie', 'c') // Assurez-vous que la relation categorie est correctement définie dans votre entité Produit
            ->where('c.id = :categoryId')
            ->setParameter('categoryId', $categoryId)
            ->getQuery();

        return $query->getResult();
    }

    public function findByKeywordInLibelleOrDescription($keyword) {
        $query = $this->createQueryBuilder('p')
            ->where('p.libelle LIKE :keyword OR p.description LIKE :keyword')
            ->setParameter('keyword', '%' . $keyword . '%')
            ->getQuery();

        return $query->getResult();
    }

    public function findByTarifLessThanOrEqualOrderedByNumero($montant) {
        $query = $this->createQueryBuilder('p')
            ->leftJoin('p.tarifs', 't') // Use LEFT JOIN to include products with no tarifs
            ->andWhere('t.tarif <= :tarif')
            ->setParameter('tarif', $montant)
            ->orderBy('p.numero', 'ASC')
            ->getQuery();

        return $query->getResult();
    }

    public function findByNumeroAndTaille($numero, $tailleId) {
        $query = $this->createQueryBuilder('p')
            ->leftJoin('p.tarifs', 't') // Join with tarifs
            ->leftJoin('t.taille', 'taille') // Join with taille
            ->andWhere('p.numero = :numero')
            ->andWhere('taille.id = :tailleId')
            ->setParameter('numero', $numero)
            ->setParameter('tailleId', $tailleId)
            ->getQuery();

        return $query->getOneOrNullResult(); // Assuming you expect one result, change as needed
    }

}

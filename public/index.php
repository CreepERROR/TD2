<?php

require_once __DIR__ . '/../vendor/autoload.php';
use catadoct\catalog\entities\Produit;
use catadoct\catalog\entities\Categorie;
use catadoct\catalog\entities\Tarif;
use catadoct\catalog\entities\Taille;
use catadoct\catalog\repositories\ProduitRepository;
use Doctrine\ORM\EntityRepository;

// Utilisez le gestionnaire d'entités
$entityManager = require_once __DIR__ . '/../src/Manager/Manager.php';

// 1. Afficher le produit d'identifiant 4
$productRepository = $entityManager->getRepository(Produit::class);
$product4 = $productRepository->find(4);

if ($product4) {
    echo "<br>1. Produit d'identifiant 4 :";
    echo "<br>   - ID: " . $product4->getId() ."\n\n";
    echo "<br>   - Numéro: " . $product4->getNumero() . "\n\n";
    echo "<br>   - Libellé: " . $product4->getLibelle() . "\n\n";
    echo "<br>   - Description: " . $product4->getDescription() . "\n\n";
    echo "<br>   - Image: " . $product4->getImage() . "\n\n";
    echo "</br>";
} else {
    echo "1. Produit d'identifiant 4 non trouvé.\n\n";
}

// 2. Afficher la catégorie 5
$categoryRepository = $entityManager->getRepository(Categorie::class);
$category5 = $categoryRepository->find(5);

if ($category5) {
    echo "<br>2. Catégorie d'identifiant 5 :\n";
    echo "   - ID: " . $category5->getId() . "\n";
    echo "   - Libellé: " . $category5->getLibelle() . "\n";
    echo "</br>";
} else {
    echo "2. Catégorie d'identifiant 5 non trouvée.\n\n";
}

// 3. Afficher la catégorie du produit d'identifiant 4
if ($product4 && $product4->getCategorie()) {
    echo "3. Catégorie du produit d'identifiant 4:\n";
    echo "   - ID: " . $product4->getCategorie()->getId() . "\n";
    echo "   - Libellé: " . $product4->getCategorie()->getLibelle() . "\n";
    echo "\n";
} else {
    echo "3. Catégorie du produit d'identifiant 4 non trouvée.\n\n";
}

// 4. Afficher tous les produits de la catégorie 5
if ($category5) {
    echo "<br>4. Tous les produits de la catégorie 5 :\n";
    $productsInCategory5 = $category5->getProduits();
    foreach ($productsInCategory5 as $product) {
        echo "<br>   - ID: " . $product->getId() . " | Libellé: " . $product->getLibelle() . "\n";
    }
    echo "</br>";
} else {
    echo "<br>4. Catégorie d'identifiant 5 non trouvée.</br>";
}
/*
// 5. Créer un nouveau produit et le relier à la catégorie 5
$newProduct = new Produit();
$newProduct->libelle = 'Nouveau produit';
$newProduct->description = 'Description du nouveau produit';
$newProduct->image = 'chemin/vers/l/image.jpg';
$newProduct->numero = 16;
$category5 = $categoryRepository->find(5);

if ($category5) {
    $newProduct->categorie = $category5;
    $entityManager->persist($newProduct);
    $newProduct->id = 13;
    $entityManager->flush();
    echo "<br>5. Nouveau produit créé et sauvegardé dans la base.</br>";
} else {
    echo "<br>5. Catégorie d'identifiant 5 non trouvée, le nouveau produit n'a pas été créé.</br>";
}

// 6. Modifier le produit créé
if ($newProduct) {
    $newProduct->setLibelle('Produit Modifié');
    $entityManager->flush();
    echo "<br>6. Nouveau produit modifié et mis à jour dans la base.</br>";
} else {
    echo "<br>6. Le nouveau produit n'a pas été trouvé pour la modification.</br>";
}

// 7. Supprimer le produit créé

if ($newProduct) {
    $entityManager->remove($newProduct);
    $entityManager->flush();
    echo "<br>7. Nouveau produit supprimé de la base.</br>";
} else {
    echo "<br>7. Le nouveau produit n'a pas été trouvé pour la suppression.</br>";
}
*/

echo "Exercice 2";
echo "<br>1. Afficher le produit avec le numéro 4</br>";
$productRepository = $entityManager->getRepository(Produit::class);
$productNumero4 = $productRepository->findOneBy(['numero' => 4]);

if ($productNumero4) {
    echo "<br>Produit avec le numéro 4 :\n";
    echo "<br>   - ID: " . $productNumero4->getId() . "\n";
    echo "<br>   - Numéro: " . $productNumero4->getNumero() . "\n";
    echo "<br>   - Libellé: " . $productNumero4->getLibelle() . "\n";
    echo "<br>   - Description: " . $productNumero4->getDescription() . "\n";
    echo "<br>   - Image: " . $productNumero4->getImage() . "\n";
} else {
    echo "Produit avec le numéro 4 non trouvé.\n";
}
echo "<br>2. Affiche le numéro 5 et le libelle peperoni'</br>";
$productRepository = $entityManager->getRepository(Produit::class);
$product5Pepperoni = $productRepository->findOneBy(['numero' => 5, 'libelle' => 'Pepperoni']);

if ($product5Pepperoni) {
    echo "Produit avec le numéro 5 et libellé 'Pepperoni':\n";
    echo "   - ID: " . $product5Pepperoni->getId() . "\n";
    echo "   - Numéro: " . $product5Pepperoni->getNumero() . "\n";
    echo "   - Libellé: " . $product5Pepperoni->getLibelle() . "\n";
    echo "   - Description: " . $product5Pepperoni->getDescription() . "\n";
    echo "   - Image: " . $product5Pepperoni->getImage() . "\n";
} else {
    echo "Produit avec le numéro 5 et libellé 'Pepperoni' non trouvé.\n";
}

echo "<br>3. Affiche le libelle de boisson'</br>";
$categoryRepository = $entityManager->getRepository(Categorie::class);
$categoryBoissons = $categoryRepository->findOneBy(['libelle' => 'Boissons']);

if ($categoryBoissons) {
    echo "Catégorie 'Boissons' et ses produits:\n";
    echo "<br>   - ID: " . $categoryBoissons->getId() . "\n";
    echo "   - Libellé: " . $categoryBoissons->getLibelle() . "\n";

    $productsInBoissonsCategory = $categoryBoissons->getProduits();
    foreach ($productsInBoissonsCategory as $product) {
        echo "<br>   - ID: " . $product->getId() . " | Libellé: " . $product->getLibelle() . "\n";
    }
} else {
    echo "Catégorie 'Boissons' non trouvée.\n";
}
echo "<br>4. Affiche si dans la description il y a Mozzarella'</br>";
$productRepository = $entityManager->getRepository(Produit::class);

// Utilisez LIKE pour rechercher 'mozzarella' dans la description
$productsWithMozzarella = $productRepository->createQueryBuilder('p')
    ->where('p.description LIKE :keyword')
    ->setParameter('keyword', '%mozzarella%')
    ->getQuery()
    ->getResult();

echo "Produits contenant 'mozzarella' dans leur description:\n";
foreach ($productsWithMozzarella as $product) {
    echo " <br>  - ID: " . $product->getId() . " | Libellé: " . $product->getLibelle() . "\n";
}
echo "<br>5. Affiche si la catégorie est 5 '</br>";
$productRepository = $entityManager->getRepository(Produit::class);

$query = $productRepository->createQueryBuilder('p')
    ->join('p.categorie', 'c')
    ->where('c.id = :categoryId')
    ->andWhere('p.description LIKE :keyword')
    ->setParameter('categoryId', 5)
    ->setParameter('keyword', '%jambon%')
    ->getQuery();

$productsInCategory5WithJambon = $query->getResult();

echo "Produits de la catégorie 5 contenant 'jambon' dans leur description:\n";
foreach ($productsInCategory5WithJambon as $product) {
    echo "   - ID: " . $product->getId() . " | Libellé: " . $product->getLibelle() . "\n";
}
echo "<br>Exercice 3</br>";

echo "1.) <br>";

$produitRepository = $entityManager->getRepository(Produit::class);
$categorieId = 5;
$produits = $produitRepository->findProductsByCategoryIdWithTarifs($categorieId);
foreach ($produits as $produit) {
    echo "   - ID: " . $produit->getId() . " | Libellé: " . $produit->getLibelle() . "\n";
    foreach ($produit->getTarifs() as $tarif) {
        echo "      - ID: " . $tarif->getId() . " | Montant: " . $tarif->getTarif() . "\n";
    }
    echo "<br>";
}

echo "2.) <br>";
$produitRepository = $entityManager->getRepository(Produit::class);
$keyword = 'jambon';
$produits = $produitRepository->findByKeywordInLibelleOrDescription($keyword);
foreach ($produits as $produit) {
    echo "   - ID: " . $produit->getId() . " | Libellé: " . $produit->getLibelle() . " | Description: " . $produit->getDescription() . "\n";
    echo "<br>";
}

echo "3.) <br>";
$produitRepository = $entityManager->getRepository(Produit::class);
$montant = 10;
$produits = $produitRepository->findByTarifLessThanOrEqualOrderedByNumero($montant);
foreach ($produits as $produit) {
    echo "   - ID: " . $produit->getId() . " | Libellé: " . $produit->getLibelle() . "\n";
    echo "tarif : ".$produit->getTarifs()[0]->getTarif();
    echo "<br>";
}

echo "4.) <br>";
$produitRepository = $entityManager->getRepository(Produit::class);
$numero = 5;
$taille = 1;
$produit = $produitRepository->findByNumeroAndTaille($numero, $taille);
if ($produit) {
    echo "   - ID: " . $produit->getId() . " | Libellé: " . $produit->getLibelle() . "\n";
    echo "tarif : ".$produit->getTarifs()[0]->getTarif();
    echo "<br>";
} else {
    echo "Produit non trouvé.\n";
}


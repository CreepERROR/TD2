<?php

namespace catadoct\catalog\Manager;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;


$entity_path = [__DIR__ . '/../entities'];

$dbParams = parse_ini_file(__DIR__.'/../../conf/db.conf.ini');

//Cache problem here
$config = ORMSetup::createAttributeMetadataConfiguration($entity_path, true);
$connection = DriverManager::getConnection($dbParams, $config);
$entityManager = new EntityManager($connection, $config);

return $entityManager;

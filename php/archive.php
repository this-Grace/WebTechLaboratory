<?php
/**
 * Archive page controller.
 * Loads data from the database and passes it to the template.
 */

require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Blog TW - Archivio";
$templateParams["nome"] = "lista_articoli.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);

//Home Template
$templateParams["articoli"] = $dbh->getPosts();
$templateParams["titolo_pagina"] = "Archivio Articoli";

require 'template/base.php';
?>
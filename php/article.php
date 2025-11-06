<?php
/**
 * Articles page controller.
 * Loads data from the database and passes it to the template.
 */

require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Blog TW - Articolo";
$templateParams["nome"] = "single_article.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);

//Home Template
$idarticolo = -1;
if (isset($_GET["id"])){
    $idarticolo = $_GET["id"];
}
$templateParams["articolo"] = $dbh->getPostById($idarticolo);

require 'template/base.php';
?>
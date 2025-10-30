<?php
/**
 * Home page controller.
 * Loads data from the database and passes it to the template.
 */

require_once("bootstrap.php");

// Template parameters
$templateParams["titolo"] = "Blog TW - Home";
$templateParams["nome"] = "lista_articoli.php";
$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
$templateParams["categorie"] = $dbh->getCategories();

// Load base template
require_once("template/base.php");
?>

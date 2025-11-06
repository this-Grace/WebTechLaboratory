<?php
/**
 * Home page controller.
 * Loads data from the database and passes it to the template.
 */

require_once("bootstrap.php");

// Template parameters
$templateParams["titolo"] = "Blog TW - Home";
$templateParams["nome"] = "articles_list.php";
$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
$templateParams["categorie"] = $dbh->getCategories();

// Template Specific
$templateParams["articoli"] = $dbh->getPosts(2);
$templateParams["titolopagina"] = "Ultimi Articoli";

// Load base template
require_once("template/base.php");
?>

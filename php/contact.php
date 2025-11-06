<?php
/**
 * Contact page controller.
 * Loads data from the database and passes it to the template.
 */

require_once 'bootstrap.php';

// Template parameters
$templateParams["titolo"] = "Blog TW - Contact";
$templateParams["nome"] = "contact_list.php";
$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
$templateParams["categorie"] = $dbh->getCategories();

// // Template Specific
$templateParams["titolopagina"] = "Contatti";
$templateParams["autori"] = $dbh->getAuthors();

// Load base template
require 'template/base.php';
?>

<?php
/**
 * Login page controller.
 * Loads data from the database and passes it to the template.
 */

require_once("bootstrap.php");

// Template parameters
$templateParams["titolo"] = "Blog TW - Login";
$templateParams["nome"] = "login_form.php";
$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
$templateParams["categorie"] = $dbh->getCategories();

// Template Specific
$templateParams["titolopagina"] = "Login";
$templateParams["username"] = "Username: ";
$templateParams["password"] = "Password: ";
$templateParams["submit"] = "Invia";


// Load base template
require_once("template/base.php");
?>

<?php
/**
 * Main configuration file.
 * Initializes the database connection and sets global constants.
 */

require_once("db/database.php");

/** @var DatabaseHelper $dbh Database connection helper */
$dbh = new DatabaseHelper("localhost", "root", "", "blogtw", 3306);

/** Directory path for uploaded files */
define("UPLOAD_DIR", "./upload/");
?>


<?php
/**
 * Connects the file to the databse
 * By Roshan Shah,000793559
 * 
 */
try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=000793559",
        "root",
        ""
    );
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}
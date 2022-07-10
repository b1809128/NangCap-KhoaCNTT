<?php
// Include database configuration file
require_once 'dbConfig.php';

// Include URL Shortener library file
require_once 'shortener.php';

// Initialize Shortener class and pass PDO object
$shortener = new Shortener($db);

// Retrieve short code from URL
$shortCode = $_GET["c"];

try{
    // Get URL by short code
    $url = $shortener->shortCodeToUrl($shortCode);
    
    // Redirect to the original URL
    header("Location: ".$url);
    exit;
}catch(Exception $e){
    // Display error
    echo $e->getMessage();
}
<?php
// Include database configuration file
require_once 'dbConfig.php';

// Include URL Shortener library file
require_once 'shortener.php';

// Initialize Shortener class and pass PDO object
$shortener = new Shortener($db);

// Long URL
$longURL = 'http://192.168.1.254/teacher-info.php?profile=ptphi';

// Prefix of the short URL 
// $shortURL_Prefix = 'http://172.16.0.254/'; // with URL rewrite
$shortURL_Prefix = 'http://192.168.1.254/?c='; // without URL rewrite

try{
    // Get short code of the URL
    $shortCode = $shortener->urlToShortCode($longURL);
    
    // Create short URL
    $shortURL = $shortURL_Prefix.$shortCode;
    
    // Display short URL
    echo 'Short URL: <a href="'.$shortURL.'">'.$shortURL.'</a>';
}catch(Exception $e){
    // Display error
    echo $e->getMessage();
}
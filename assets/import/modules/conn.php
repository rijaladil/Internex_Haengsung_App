<?php
$conn = null;
try {
    // $conn = new PDO("mysql:host=localhost;dbname=internex_daebaek","root","123asd456");
    // $conn = new PDO("mysql:host=localhost;dbname=internex_daebaek","root","1234");
     $conn = new PDO("mysql:host=localhost;dbname=internex_daebaek","root","123asd456");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
    //var_dump($ex);
}
//var_dump($conn);
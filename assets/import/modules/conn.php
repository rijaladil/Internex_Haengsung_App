<?php
$conn = null;
try {
    $conn = new PDO("mysql:host=internex.co.id;dbname=u8003544_haengsung_counting","u8003544_haengsung","12internex34");
    // $conn = new PDO("mysql:host=localhost;dbname=internex_haengsung","admin","12internex34");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
    //var_dump($ex);
}
//var_dump($conn);
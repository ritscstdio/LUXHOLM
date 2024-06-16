<?php

//DATABASE VALUE
$dsn = "mysql:host=localhost; dbname=luxholm";
$dbusername = "root";
$dbpassword = "";

//CONNECT TO DATABASE
try {  
    //CREATE NEW PDO OBJECT
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute (PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //ERROR MESSAGE    
    echo "Connection failed: " . $e->getMessage();
}                                                    




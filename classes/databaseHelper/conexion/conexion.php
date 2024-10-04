<?php
    //conexion a la base de datos (temporales)
    $host = 'localhost';
    $db = 'recursos humano';
    $dbuser = 'D72024';
    $dbpass = '1234567';

    //se debe cambiar esto


    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $dbuser, $dbpass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "conecion";
    } catch (Exception $err) {
        echo $err->getMessage();
    }
?>
<?php
    //conexion a la base de datos (temporales)
    $host = 'localhost';
    $db = 'proyecto_db';
    $dbuser = 'userbd';
    $dbpass = 'passworddb';

    //se debe cambiar esto


    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $dbuser, $dbpass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return  $pdo;


    } catch (Exception $err) {
        echo $err->getMessage();
    }
?>
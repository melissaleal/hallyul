<?php
    include '../public/configs/database.php';
    $databaseType = "mysql";
    $server = "localhost";
    $port = 3306;
    $database = $dbname;

    $databaseUser = $user;
    $userPassword = $password;

    $dsn = "$databaseType:host=$server;dbname=$database;port=$port";

    try{
        $pdo = new PDO($dsn, $databaseUser, $userPassword);
    }catch(PDOException $exception){
        throw new PDOException($exception->getMessage(), $exception->getCode());
    }
?>
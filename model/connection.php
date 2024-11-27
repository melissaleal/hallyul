<?php
    include '../public/configs/database.php';
    $databasetype = "mysql";
    $server = "localhost";
    $port = 3306;
    $database = $dbname;

    $databaseUser = $user;
    $userPassword = $password;

    $dsn = "$databasetype:host=$server;dbname=$database;port=$port";

    try{
        $pdo = new PDO($dsn, $databaseUser, $userPassword);
    }catch(PDOException $exception){
        throw new PDOException($exception->getMessage(), $exception->getCode());
    }
?>
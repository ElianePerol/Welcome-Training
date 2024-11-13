<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Connection to database
    $host = "localhost";
    $db = "welcome-training";
    $user = "admin-welcome-training";
    $pwd = "BeepBoop.0.0";
    $charset = "utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO('mysql:host='.$host.'; port=3306; dbname='.$db,$user,$pwd);

    // echo("<pre>");
    // echo("<code>");
    // var_dump($_POST);
    // echo("</code>");
    // echo("</pre>");

?>
<?php

    $host = '127.0.0.1';
    $db   = 'quizzer';
    $user = 'admin';
    $pass = '1q2w3e4r';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    # Подключение к БД
   $pdo= new PDO($dsn, $user, $pass, $opt);
  

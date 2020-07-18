<?php

    $host = '127.0.0.1';
    $db   = 'quizzer';
    $user = 'admin';
    $pass = 'password';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    # Подключение к БД
   $pdo= new PDO($dsn, $user, $pass, $opt);
  

   if( ! isset ($_SESSION['score'])){
    $_SESSION['score'] = 0;
}

if($_POST){
$number=$_POST['number'];
$selected_choice=$_POST['choice'];
$next=$number+1;

        
$stmt=$pdo->prepare("
SELECT
    *
FROM
    `questions`
");

$stmt->execute();
$total=$stmt->rowCount();


$stmt=$pdo->prepare("
SELECT
    *
FROM
    `choices`
WHERE
    `question_number` = $number AND `is_correct`=1 ;
");

$stmt->execute();
$choice=$stmt->fetch(PDO::FETCH_ASSOC);

$correct_choice=$choice['id'];
echo $choice;
}
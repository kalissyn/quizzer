<?php
include 'DB.php';


$stmt=$pdo->prepare("
    SELECT
        *
    FROM
        `questions`
    ");

$stmt->execute();
$total=$stmt->rowCount();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Тест</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
    <header>
        <div class="container">
            <h1>Тест по основам PHP</h1>
         </div>
    </header>
    <main>
        <div class="container">
            <h2>Количество вопросов:<?= $total; ?></h2>
            <a href="question.php?n=1" class="start">Начать</a>
        </div>
    </main>
</body>
</html>
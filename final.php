<?php session_start(); ?>
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
            <p>Поздравляю, вы закончили тест!</p>
            <p>Правильных ответов: <?= $_SESSION['score'] ; ?></p>
            <a href="question.php?n=1" class="start">Начать заново</a>
            <?php session_destroy(); ?>
        </div>
    </main>
</body>
</html>

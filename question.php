<?php
include 'DB.php';

session_start(); 

$number =(int) $_GET['n'];

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
        `questions`
    WHERE
        `question_number` = $number;
");

$stmt->execute();
$question=$stmt->fetch(PDO::FETCH_ASSOC);

$stmt=$pdo->prepare("
    SELECT
        *
    FROM
        `choices`
    WHERE
        `question_number` = $number;
");

$stmt->execute();
$choices=$stmt->fetchAll();
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
            <div class="current"><?= $question['question_number'] ; ?> вопрос из <?= $total?> </div>
            <p class="question">
                <?= $question['text'];?>
            </p>
            <form method="post" action="process.php">
                <ul class="choices">
                    <?php foreach($choices as $choice) : ?>
                    <li><input name="choice" type="radio" value="<?= $choice['id']; ?>"/><?= $choice['text']?></li>
                    <?php endforeach; ?>
                </ul>
                <input type="submit" value="Ответить"/>
                <input type="hidden" name ="number" value="<?= $number; ?>"/>
            </form>
        </div>
    </main>
</body>
</html>
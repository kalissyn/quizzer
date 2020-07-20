<?php 
    include 'DB.php'; 
    session_start(); 

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
        `question_number` = $number AND `is_correct` = 1 ;
");

    $stmt->execute();
    $choice=$stmt->fetch();
 
    $correct_choice=$choice['id'];
    

    if($correct_choice==$selected_choice  ){
        $_SESSION['score']++;
     
        
    }
  
 
    if($number==$total){
        header("Location: final.php");
    }else{
        header("Location: question.php?n=".$next);
    }
}
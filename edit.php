<?php
  session_start();

            if($_POST['num']){
                //print_r($_POST);
                $stmt1 = $connect->prepare('update '.$_POST['table'].' set '.$_POST['key'].' = ? where `serial_number` = ?'); 
                $stmt1->execute(array($_POST['value'],$_POST['num']));
                header('location:index.php?page='.$_POST["table"].'&id='.$_POST["num"].'');
                exit();

            }else{
                session_unset();
                session_destroy();
                header('location:login.php');
    exit();
}
?>

<?php
  //language function
  function settitle(){
    global $pagename; //accessable from any where
    if(isset($pagename)){
      echo $pagename;
    };
  }
  //function get all
  function getalldata($select , $table ,$where = NULL , $and = NULL, $order , $ordering = 'DESC'){
    global $connect;
    $quer =$connect->prepare("SELECT $select FROM $table $where $and ORDER BY $order $ordering");
    $resu =$quer-execute();
    return $resu;
  }
  //check id from db function
  function checkdata($sele , $table ,$seleid, $id){
    global $connect;
    $stmt1 = $con->prepare("SELECT * FROM $table WHERE user_name = :user");
    $stmt1->bindParam(":user",$user);
    $stmt1->execute();
    $row = $stmt->rowCount();
    return $row;
  }
  //check name from db function
  function getdata($sele , $table , $user){
    global $connect;
    $stmt1 = $con->prepare("SELECT $select FROM $table WHERE user_name = :user");
    $stmt1->bindParam(":user",$user);
    $stmt1->execute();
    $row = $stmt->rowCount();
    return $row;
  }
  //redirect function
  function redirectpage($masge , $url = null , $scond = 5){
    if($url == null){
      $url = 'index.php';
    }else {
      if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
      $url = $_SERVER['HTTP_REFERER'];
      }else {
        $url = 'index.php';
      };
    }
    echo $masge ;
    header("refresh:$scond;url=$url");
    exit();
  } 
  //count Items function
  function getcount($select , $tabel){
    global $connect;
    $stmt2 = $connect->prepare("SELECT COUNT(?) FROM $tabel");
    $stmt2->execute(array($select));
    $row1 = $stmt2->fetchcolumn();
    return $row1;
  }
//count Items function
  function getcount1($select , $tabel,$where){
    global $connect;
    $stmt3 = $connect->prepare("SELECT COUNT(?) FROM $tabel $where");
    $stmt3->execute(array($select));
    $row3 = $stmt3->fetchcolumn();
    return $row3;
  }
  //count last items recorded function
  function getlastitme($selec ,$table ,$period = 30){
    global $connect;
    $stmt = $connect->prepare("SELECT COUNT(?) FROM $table WHERE ? BETWEEN DATE_SUB(CURRENT_DATE(),INTERVAL ? DAY) AND CURRENT_DATE()");
    $stmt->execute(array($selec,$selec,$period));
    $row2 = $stmt->fetchcolumn();
    return $row2;
  }
//validate form
  function filterinput($str){
      $str = trim($str);
      $str = addslashes($str);
      $str = htmlspecialchars($str);
      return $str;
  }
?>

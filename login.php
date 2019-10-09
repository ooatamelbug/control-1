<?php
  session_start();
  if (isset($_SESSION['ID']) && !empty($_SESSION['ID'])){
    header('location:index.php');
    exit();
  }
  ?>
  <?php
    include 'connectPDO.PHP';
    if($_POST){
      $pass = sha1($_POST['pass']);
      $stmt1 = $connect->prepare("SELECT * FROM user WHERE username = ? and pass = ?");
      $stmt1->execute(array($_POST['name'],$pass));
      $row = $stmt1->rowCount();
      $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
      if($row > 0 ){
        $_SESSION['ID'] = $row1['id'];
        $_SESSION['IDn'] = $row1['name'];
        header('location:search.php');
        exit();
      }

  }
  ?>
<!DOCTYPE html>
        <html>
          <head>
            <meta charset="UTF-8" >
            <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
            <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
            <link href="assets/styles.css" rel="stylesheet" media="screen">
<!--            <link rel="stylesheet" href="themes/css/front.css">-->
              <title>login</title>
          </head>
        <body id="login">
          <div class="container">

            <form class="form-signin"  action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                <h2 class="form-signin-heading">Please sign in</h2>
                <input type="text" name="name" class="input-block-level" placeholder="Email address">
                <input type="password" name="pass" class="input-block-level" placeholder="Password">
                <label class="checkbox">
<!--                  <input type="checkbox" value="remember-me"> Remember me-->
                </label>
                <button class="btn btn-large btn-primary" type="submit">Sign in</button>
              </form>

        </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
<!--    <script src="themes/js/front.js"></script>-->
  </body>
</html>
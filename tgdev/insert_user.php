<html>
<head>
  <title>Insert User</title>
  <!-- Bootstrap core CSS -->
        <link href="bootstrap.css" rel="stylesheet">
</head>

<body>

<h2 align="center"><img src="../logo.png" /></h2>

<?php
  include('../dbconfig.php');
  session_start();
  if($_SESSION['login'] != "OK")
  {
    header('Location: login.php');
    exit();
  }
  if($_SESSION['isadmin'] != 1)
  {
    header('Location: login.php');
    exit();
  }

  $new_user = $_POST["new_username"];
  $new_pass = $_POST["new_password"];
  $new_mcc = $_POST["new_mcc"];
  $is_admin = $_POST["is_admin"];
  $sql=("insert into `USERS` (username,password,mcc,admin) values ('$new_user','$new_pass','$new_mcc','$is_admin')");
  mysqli_query($db,$sql) or die ("User creation failed.");
  echo '<h2 align="center">User created successfully.</h2>';
  echo '<p align="center"><a class="btn btn-success" href="index.php">TG Manager</a> <a class="btn btn-danger" href="login.php">Log Out</a></p>';
?>
</body>
</html>
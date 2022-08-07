<?php
  include('../dbconfig.php');
  $user = "";
  $pass = "";
  $rs = "";
  $row = "";
  $validated = false;

  if ($_POST)
  {
    $user = $_POST['username'];
    $pass = $_POST['password'];
  }

  session_start();
  $_SESSION['login'] = "";
  if($user!="" && $pass!="")
  {
    $rs = $db->query("SELECT * FROM USERS WHERE username = '$user' AND password = '$pass'");
    $result = $rs->num_rows;
    $row=mysqli_fetch_array($rs);
    if ($result > 0) $validated = true;
    if($validated)
    {
      $_SESSION['login'] = "OK";
      $_SESSION['username'] = $user;
      $_SESSION['mcc'] = $row['mcc'];
      $_SESSION['isadmin'] = $row['admin'];
      header('Location: index.php');
    }
    else
    {
      $_SESSION['login'] = "";
      echo '<h2 align="center">Invalid username or password.</h2>';
    }
  }
  else 
  $_SESSION['login'] = "";
?>

<html>
  <head>
    <title>Login Page</title>
    <!-- Bootstrap core CSS -->
        <link href="bootstrap.css" rel="stylesheet">
        <!-- Add custom CSS here -->
        <link href="style.css" rel="stylesheet">
  </head>

  <body>
  <h1 align="center"><img src="../logo.png" /></br></br>Login to TG Manager</h1></br></br>
    <form action="login.php" method="post">
      <table class="table table-striped table-bordered">
          <tbody>
          <tr><th>Username</th><td><input size=\"30\" type="text" size="30" maxlength="30" name="username"></td></tr>
          <tr><th>Password</th><td><input size=\"30\" type="password" size="30" maxlength="30" name="password"></td></tr>
          <tr><td><input class="btn btn-danger" type="submit" value="Login"></td></tr>
        </tbody>
      </table>
    </form></br></br>
    <p align="center"><a class="btn btn-success" href="../index.php">Return to Homepage</a></p></br></br>
  </body>
</html>
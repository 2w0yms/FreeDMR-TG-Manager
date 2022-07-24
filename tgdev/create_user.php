<?php

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
?>

<html>
<head>
  <title>Create User</title>
  <!-- Bootstrap core CSS -->
        <link href="bootstrap.css" rel="stylesheet">
        <!-- Add custom CSS here -->
        <link href="style.css" rel="stylesheet">
</head>

<body>

<h2 align="center"><img src="../logo.png" /></br></br>Create a new user</h2>

<h2 align="center">Please enter details for the new user</h2>

<form action="insert_user.php" method="post">
<table class="table table-striped table-bordered">
<thead class="thead-dark">
    <th>Username</th><th>Password</th><th>Permitted MCC</th><th>Is system admin - 1 (yes) or 0 (no)</th><th>Submit</th>
    </thead>
    <tbody><td><input size=\"30\" type="text" size="30" maxlength="30" name="new_username"></td><td><input size=\"30\" type="password" size="30" maxlength="30" name="new_password"></td>
    <td><input size=\"5\" type="number" size="5" maxlength="5" name="new_mcc"></td><td><input size=\"1\" type="number" size="1" maxlength="1" name="is_admin"></td>
      <td><input class="btn btn-warning" type="submit" value="Create user"></td>
    </tbody>
  </table>
</form>
</br></br><p align="center"><a class="btn btn-success" href="index.php">Back to TG Manager</a></p></br></br>
</body>
</html>
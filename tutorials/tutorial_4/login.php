<?php
session_start();
const username = 'admin';
const password = 'admin';

//when form submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
  if ($_POST['username'] === username && $_POST['password'] === password) {
    $_SESSION['username'] = $_POST['username']; //write login to server storage
    header('Location: index.php'); //redirect to main
  } else {
    echo "<script>alert ('Incorrect credentials, Try Again')</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Login Form</h1>
  <form action="login.php" method="post" enctype="multipart/form-data">
    <div class="form-input">
      <label for="username">Username</label>
      <input type="username" name="username" value="" require>
    </div>
    <div class="form-input">
      <label for="password">Password</label>
      <input type="password" name="password" value="" require>
    </div>
    <div class="form-input">
      <input type="submit" value="Login">
      <a href="./">Cancle</a>
    </div>
  </form>
</body>

</html>
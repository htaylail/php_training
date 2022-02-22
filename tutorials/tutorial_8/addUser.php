<?php


require 'config.php';

if (!empty($_POST)) {
  $sql = "INSERT INTO users(name, phone,email,address,password ,created_at) VALUES (:name,:phone,:email,:address,:password,:created_at)";
  $pdo_statement = $pdo->prepare($sql);
  $result = $pdo_statement->execute(
    array(':name' => $_POST['name'], ':phone' => $_POST['phone'], ':email' => $_POST['email'], ':address' => $_POST['address'], ':password' => $_POST['password'], ':created_at' => $_POST['created_at']));

  if ($result) {
    echo "<script>
      alert('Record is add');
      window.location.href='index.php';
    </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New User</title>
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <div class="wrapper">
    <div class="form-control">
      <h1>Add New User</h1>
      <form class="" action="addUser.php" method="post" enctype="mutlipart/form-data">
        <div class="form-group">
          <label for="name">User Name</label>
          <input type="text" name="name" value="" require>
        </div>

        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="text" name="phone" value="" require>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" value="" require>
        </div>

        <div class="form-group">
          <label for="address">Address</label>
          <input type="address" name="address" value="" require>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" value="" require>
        </div>

        <div class="form-group">
          <label for="created_at">Created At</label>
          <input type="date" name="created_at" value="" require>
        </div>

        <input type="submit" class="btn btn-primary" name="" value="Register">
        <a class="btn btn-warning" href="index.php">Back</a>


      </form>
    </div>
  </div>

</body>

</html>
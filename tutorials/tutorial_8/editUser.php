<?php
require 'config.php';

if (!empty($_POST)) {
  $userId = $_POST['user_id'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $created_at = $_POST['created_at'];
  $pdo_statement = $pdo->prepare("UPDATE users set name = '$name', phone = '$phone', email = '$email', address = '$address',
       password = '$password',  created_at = '$created_at' WHERE user_id = '$userId'");

  $result = $pdo_statement->execute();
  if ($result) {
    echo "<script>
          alert('Record is updated');
          window.location.href = 'index.php';
       </script>";
  }
}

$pdo_statement = $pdo->prepare("SELECT * FROM users WHERE user_id = " . $_GET['user_id']);
$pdo_statement->execute();

$result = $pdo_statement->fetchAll();


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
      <h1>Edit User Data</h1>
      <form class="" action="editUser.php?user_id=$result[0]['user_id']" method="post" enctype="mutlipart/form-data">
        <input type="hidden" name="user_id" value="<?php echo $result[0]['user_id'] ?>" require>
        <div class="form-group">
          <label for="name">User Name</label>
          <input type="text" name="name" value="<?php echo $result[0]['name'] ?>" require>
        </div>

        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="text" name="phone" value="<?php echo $result[0]['phone'] ?>" require>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" value="<?php echo $result[0]['email'] ?>" require>
        </div>

        <div class="form-group">
          <label for="address">Address</label>
          <input type="address" name="address" value="<?php echo $result[0]['address'] ?>" require>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" value="<?php echo $result[0]['password'] ?>" require>
        </div>

        <div class="form-group">
          <label for="created_at">Created At</label>
          <input type="date" name="created_at" value="<?php echo date('Y-m-d', strtotime($result[0]['created_at'])) ?>" require>
        </div>

        <input type="submit" class="btn btn-primary" name="" value="Update">
        <a class="btn btn-warning" href="index.php">Back</a>


      </form>
    </div>
  </div>

</body>

</html>
<?php

require 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <?php
  $pdoStatement = $pdo->prepare("SELECT * FROM users ORDER BY user_id DESC");
  $pdoStatement->execute();
  $result = $pdoStatement->fetchAll();
  ?>

  <div class="wrapper">
    <div class="sec-table">
      <table>
        <h2>User Management</h2>
        <div>
          <a class="btn btn-primary" href="addUser.php">Create New</a>
          <a class="btn btn-danger" href="logout.php">Logout</a>
        </div><br>
        <thead>
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Age</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Password</th>
            <th>Created At</th>
            <th>Operation</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result) : ?>
            <?php foreach ($result as $value) : ?>
              <tr>
                <td> <?php echo $value['user_id'] ?></td>
                <td> <?php echo $value['name'] ?></td>
                <td> <?php echo $value['age'] ?></td>
                <td> <?php echo $value['phone'] ?></td>
                <td> <?php echo $value['email'] ?></td>
                <td> <?php echo $value['address'] ?></td>
                <td> </td>
                <td> <?php echo date('d-m-Y', strtotime($value['created_at'])) ?></td>
                <td>
                  <a OnClick="return confirm('Are you Sure want to edit user');" href="editUser.php?user_id=<?php echo $value['user_id'] ?>">Edit</a>
                  <a OnClick="return confirm('Are you Sure want to delete user');" href="deleteUser.php?user_id=<?php echo $value['user_id'] ?>">Delete</a>
                </td>
              </tr>
          <?php
            endforeach;
          endif;
          ?>
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>
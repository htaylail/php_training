<?php
require 'config.php';

if (!empty($_POST)) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $created_at = $_POST['created_at'];

    if ($name == '' || $age == '' || $phone == '' || $email == '' || $address == '' || $password == '' || $created_at == '') {
        echo "<script> alert('Fill form data')</script>";
    } else {
        $sql = "SELECT COUNT(email) AS num FROM users WHERE email = :email";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':email', $email);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($row['num'] > 0) {
            echo "<script>alert ('This email is already exists')</script>";
        } else {
            $passwordHash = password_hash($passwrod, PASSWORD_BCRYPT);
            $sql = "INSERT INTO users(name, age, phone, email, address, password ,created_at) VALUES (:name,:age,:phone,:email,:address,:password,:created_at)";

            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute(
                array(':name' => $_POST['name'], ':age' => $_POST['age'], ':phone' => $_POST['phone'], ':email' => $_POST['email'], ':address' => $_POST['address'], ':password' => $_POST['password'], ':created_at' => $_POST['created_at'])
            );

            if ($result) {
                echo "<script>
              alert('Record is add');
              window.location.href='index.php';
            </script>";
            }
        }
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
                    <input type="text" name="name" value="<?php echo $name; ?>" require>
                </div>

                <div class="form-group">
                    <label for="age">User Name</label>
                    <input type="number" name="age" value="<?php echo $age; ?>" require>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" name="phone" value="<?php echo $phone; ?>" require>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?php echo $email; ?>" require>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="address" name="address" value="<?php echo $address; ?>" require>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" value="<?php echo $password; ?>" require>
                </div>

                <div class="form-group">
                    <label for="created_at">Created At</label>
                    <input type="date" name="created_at" value="<?php echo $created_at; ?>" require>
                </div>

                <input type="submit" class="btn btn-primary" name="" value="Register">
                <a class="btn btn-warning" href="index.php">Back</a>

            </form>
        </div>
    </div>
</body>

</html>
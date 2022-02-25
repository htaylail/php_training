<?php
require 'config.php';
session_start();
ob_start();

if (!empty($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = :email";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':email', $email);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($_POST['email'] == $user['email'] && $_POST['password'] == $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['logged_in'] = time();
        header('Location:index.php');
        exit();
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
    <div class="wrapper">
        <div class="form-control">
            <h1>Login</h1>
            <form class="" action="login.php" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?php echo $email; ?>" require>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" value="<?php echo $password; ?>" require>
                </div>

                <input type="submit" class="btn btn-primary" name="" value="Login">
                <a href="requestReset.php">Forget Password?</a>
            </form>
        </div>
    </div>

</body>

</html>
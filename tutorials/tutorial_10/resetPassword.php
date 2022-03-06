<?php
require 'config.php';

if (!isset($_GET['code'])) {
        exit("Can't find page");
}
$code = $_GET['code'];
$sql = "SELECT COUNT(email) AS num FROM resetpasswords WHERE code = :code";
$statement = $pdo->prepare($sql);
$statement->bindValue(':code', $code);
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);
if ($row['num'] == 0) {
    exit("Can't find page");
}

if (!empty($_POST)) {  
    $sql = "SELECT email,code FROM resetpasswords WHERE code = '"  . $code . "'";
    $emaiQuery = $pdo->prepare($sql);
    $result = $emaiQuery->execute();
    $result = $emaiQuery->fetchAll();   
    $email = $result[0]['email'];
    $password = $_POST['newpassword'];
    $comfimPassword = $_POST['comfimPassword'];

    if ($password == $comfimPassword )  {
        $passwordHash = password_hash($passwrod, PASSWORD_BCRYPT);
        $pdoStatement = $pdo->prepare("UPDATE users SET password = '" . $passwordHash . "' WHERE email = '" . $email . "'");
        $result = $pdoStatement->execute();
    
        if ($result) {
            $pdoStatement = $pdo->prepare("DELETE FROM resetpasswords WHERE code = '"  . $code . "'");
            $result = $pdoStatement->execute();
            echo "<script> alert('Record is updated');
                    window.location.href = 'login.php'; </script>";
        } else  {
            exit ("Something");
        }
    } else {
        echo "<div class='msg-reply'> <p> Your password and comfirmPassword are not same ! Check again!</p></div>";
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
            <form class="" action="" method="post">
                <div class="form-group">
                    <label for="newpassword">New Password</label>
                    <input type="password" name="newpassword" value="" require>
                </div>

                <div class="form-group">
                    <label for="comfimPassword">Comfirm Password</label>
                    <input type="password" name="comfimPassword" value="" require>
                </div>

                <input type="submit" class="btn btn-primary" name="" value="Change Password">
            </form>
        </div>
    </div>

</body>

</html>
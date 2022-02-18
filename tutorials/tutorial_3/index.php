<?php
// to check age is exist or not
if (!empty($_POST['age'])) {
    $dateOfBirth = $_POST['age'];
    $todayDate = date("Y-m-d");
    $currentAge = date_diff(date_create($dateOfBirth), date_create($todayDate));
    $yourAge = $currentAge->format('%y');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate age</title>
</head>

<body>
    <form action="index.php" method="post">
        <label for="age">Enter your age</label>
        <input type="date" name="age" value="" require>
        <input type="submit" value="Calculate">
    </form>
    <br>
    <p>Your age is : <?php echo $yourAge ?> year old.</p>
    </div>

</body>

</html>
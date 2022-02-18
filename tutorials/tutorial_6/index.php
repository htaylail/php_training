<?php
//to check image file is submit or not
if (isset($_POST['submit'])) {
    if (!empty($_FILES['image'] and $_POST['folder'])) {
        $fileName = $_FILES['image']['name'];
        $tmpFile = $_FILES['image']['tmp_name'];
        //to check file extension
        $allowedExt = array("jpg", "png", "jpeg", "gif");
        // to break string into array
        $splitFileName = explode('.', $fileName);
        //to change string to lowercase
        $imageExt = strtolower(end($splitFileName));
        if (in_array($imageExt, $allowedExt)) {
            $dir = $_POST['folder'];
            // to check folser is already exist or not
            if (!is_dir($dir)) {
                echo "This folder name is not exist so create it now.";
                $folder = mkdir($dir, "0777", false);
                $tmpFile = $folder;
                move_uploaded_file($tmpFile, "$folder/$fileName");
            } else {
                move_uploaded_file($tmpFile, "$dir/$fileName");
            }
        } else {
            echo "Please check your file again! " . $imageExt;
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
    <title>Tutorial 6</title>
</head>

<body>
    <h1>Image Upload</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="image">UploadImage</label>
        <input type="file" name="image" value="image" require>

        <label for="folder">UploadImage</label>
        <input type="text" name="folder" value="" require>
        <br />
        <input type="submit" name="submit" value="Upload">
    </form>

</body>

</html>
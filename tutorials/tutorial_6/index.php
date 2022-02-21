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
    <form action="file.php" method="post" enctype="multipart/form-data">
        <label for="image">UploadImage</label>
        <input type="file" name="image" value="image" require>

        <label for="folder">UploadImage</label>
        <input type="text" name="folder" value="" require>
        <br />
        <input type="submit" name="submit" value="Upload">
    </form>

</body>

</html>
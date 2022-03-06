<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 6</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="sec-upload">
        <h1 class="tittle">Image Upload</h1>
        <form action="fileUpload.php" method="post" enctype="multipart/form-data">
            <div class="form-control">
                <label for="image">Upload Image</label>
                <input type="file" name="image" value="image" require>
            </div>
            <div class="form-control">                
                <label for="folder">Folder Name</label>
                <input type="text" name="folder" value="" require>
            </div>           
           <div class="form-control">
                <input type="submit" name="submit" value="Upload">
           </div>
        </form> 
    </div>

</body>

</html>
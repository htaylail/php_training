<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Tutorial 7</title>
     <link rel="stylesheet" href="style.css">
</head>

<body>
     <div class="wrapper">
          <h2>Please Fill Data to Create QR Code</h2>
          <form method="post" action="qrcode.php" enctype="multipart/form-data">
               <div class="form-item">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="" require>
               </div>

               <div class="form-item">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="" require>
               </div>

               <div class="form-item">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="" require>
               </div>

               <div class="form-item">
                    <label for="filename">Your File Name</label>
                    <input type="text" name="filename" value="" require>
               </div>
               <input class="btn" type="submit" name="inputText" value="Generate">
          </form>

     </div>

</body>

</html>
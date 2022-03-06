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
                move_uploaded_file($tmpFile, "$dir/$fileName");
            } else {
                move_uploaded_file($tmpFile, "$dir/$fileName");
            }
        } else {
            echo "Please check your file again! " . $imageExt;
        }
    }
}
?>
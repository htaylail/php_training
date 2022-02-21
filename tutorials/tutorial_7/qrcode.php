<?php 
require_once 'phpqrcode/qrlib.php';

if (isset($_POST['inputText'])) {
    if (!empty($_POST['name'] && $_POST['email'] && $_POST['address'] && $_POST['filename'])) {
        // Text to output
        $text = $_POST['name'];
        $text .= $_POST['email'];
        $text .= $_POST['address'];
        $path="images/";      
        $qrCodeName = $_POST['filename'];
        // $qrName = $folder.$fileName;
        $file = $path.uniqid($qrCodeName).".png";
        // png($text, $file, ECC_LEVEL, Pixel_Size, Frame_size)
        QRcode::png($text,$file,'L',10,2);
    }
}
?>
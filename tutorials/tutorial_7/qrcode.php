<?php

require_once 'phpqrcode/qrlib.php';

if (isset($_POST['inputText'])) {
    if (!empty($_POST['name'] && $_POST['email'] && $_POST['address'] && $_POST['filename'])) {
        // Text to output
        $text = $_POST['name'];
        $text .= $_POST['email'];
        $text .= $_POST['address'];
        mkdir('images');
        $path = "images/";
        $qrCodeName = $_POST['filename'];
        $file = $path . uniqid($qrCodeName) . ".png";
        // to create & display -> png($text, $file, ECC_LEVEL, Pixel_Size, Frame_size)
        QRcode::png($text, $file, 'L', 10, 2);
        echo "<img src='" . $file . "'>";
    }
}
?>
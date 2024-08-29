<?php
    include 'phpqrcode/qrlib.php';
    $path= 'images/';
    $qrcode= $path.rand()."png";

    QRcode::png("http://localhost/source_bookstore/public_html/index.php",$qrcode);
    echo "<img src='".$qrcode."'>";
?>
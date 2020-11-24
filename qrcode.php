<?php
include "qrlib.php";
$n=$_GET['id'];
// create a QR Code with this text and display it
QRcode::png($n);

?>

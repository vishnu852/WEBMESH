<html>
<head>

</head>
<body>
<form method="post">
<input type="text" name="n" /><input type="submit" name="sub" value="View" />

</form>

</body>

</html>
<?php
if(isset($_POST['sub']))
{
$n=$_POST['n'];
?>
<iframe src="qrcode.php?id=<?php echo $n ?>" style='border:none;'></iframe>
<?php
}
?>
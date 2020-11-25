<?php
include '../connection.php';
$v=$_GET['v'];
$id=$_GET['id'];
$f=$_GET['f'];
$up_taluk=mysql_query("update vil_info set $f='$v' where id='$id'");
if($up_taluk>0)
{
    echo $v;
}
?>
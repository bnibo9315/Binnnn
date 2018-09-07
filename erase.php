<?php
$connect = mysqli_connect("localhost","root","","thongtinkhachhang");
mysqli_set_charset($connect,'utf8');
$id= $_GET['id'];
$sql ="DELETE FROM khachhang WHERE id='$id'";
header('Location:sentdata.php');


?>
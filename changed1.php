<?php
session_start();
?>
<!doctype html>
<html>
<head >
<meta charset="utf-8">
<title>Cập nhập thành công </title>
</head>
<body style="text-align: center;">

<td>
<p style="font-size: 30px;string-set: content;">Xin chào  <?php
echo $_SESSION['user_name'];

?>
 </p>
<p style="font-size: 30px;string-set: content;">
Chúc mừng bạn đã cập nhật thành công
</p>
</td>
<td>
<?php
if(isset($_POST['home']))
{   
    
    header('Location: home.php');
}

?>

<input  name="home" type="submit" value="Quay lại trang trang chủ"   />
</td>






</body>
</html>
<?php

/**
 * @author lolkittens
 * @copyright 2018
 */



?>
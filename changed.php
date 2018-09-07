<?php
session_start();
?>
<!doctype html>
<html>
<head >
<meta charset="utf-8">
<title> Cập nhật thành công </title>
</head>
<body style="text-align: center;">

<td>
<p style="font-size: 30px;string-set: content;">Xin chào  <?php
echo $_SESSION['user_name'];

?>
 </p>
<p style="font-size: 30px;string-set: content;">
Chúc mừng bạn đã cập nhập thành công
</p>
</td>
<td>
<p style="color: red;font-size: 30px;string-set: content;">
Vui lòng đăng nhập lại
</p>
</td>
<input name="submit"  type="submit" value="Quay lại trang đăng nhập"   />
<?php
if(isset($_POST['submit']))
{   
    unset($_SESSION['user_name']);
    header('Location: index.php');
}
else{
      unset($_SESSION['user_name']);
    header('Location: index.php');
}
?>





</body>
</html>
<?php

/**
 * @author lolkittens
 * @copyright 2018
 */



?>
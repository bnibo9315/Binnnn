<?php
session_start();
if(isset($_SESSION['user_name'])){
    header('Location:home.php');
    
}
else
{
    

?>
<!doctype html>
<html>
<head >
<meta charset="utf-8">
<title> Kho Giữ Ðồ Tự Ðộng </title>
<link rel="shortcut icon" href="/favicon.ico"> 
<link href="Style/Dangnhap.css" rel="stylesheet" type="text/css">
<img src="img/Iconn.png">
</head>
<body>
<style>body
		{background-image: url(img/banner_ve_3-1.jpg);
		  background-repeat: repeat;
		}
         input
	  {
	   font-size: 20px;
	  }
		</style>  
<form action="" method="post" style="color: green;">
<h1 style="color:red;"> 
  <p style="text-align: center" > 
    Kho Giữ Ðồ Tự Ðộng
  </p>
</h1>
<td>
    <input placeholder="Tên đăng nhập" type="text" name="user_name" id="email"  required=""> 
</td>
<td>
  <input placeholder="Mật khẩu của bạn" type="password" name="password"  required="">
</td>
<td>
  <button type="submit" name="submit"  >Đăng Nhập</button>
</td>
<td>
 <button type="submit" ><a  href="sentdata.php" style="text-decoration: none;color: white;">Đăng Ký</a></button>
</td>
</form>
<h3  style="text-align:center">
	© 2018 Dự án được phát triển bỏi Thành Quang Long | Tất cả các bản quyền và thiết kế thuộc chủ sở hữu  
	<a href="https://www.facebook.com/profile.php?id=100009118588864" target="_blank"><style>
		 a:visited {color: #006600};
		</style> Bin Bò </a>
</h3>

<?php

$connect = mysqli_connect("localhost","root","","thongtinkhachhang");
mysqli_set_charset($connect,'utf8');

if(isset($_POST["submit"]))
{
    
    $user_name= mysqli_real_escape_string($connect,$_POST['user_name']);
    $password = mysqli_real_escape_string($connect,$_POST['password']);
    $sql="SELECT user_name,password FROM khachhang WHERE user_name='$user_name' and password='$password'" ;
    $query=mysqli_query($connect,$sql);
    $num_row=mysqli_num_rows($query);
    if($num_row != 0)
    {
        $_SESSION['user_name']=$_POST['user_name'];
         header('Location:home.php ');
    }
   else
   {
        header('Location:loidangnhap.php');
   }

}




?>

</body>
</html>
<?php
};
?>

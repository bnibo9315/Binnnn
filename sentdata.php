<?php
session_start();

?>
<!doctype html>
<html>
<head >
<meta charset="utf-8">
<title> Sent Data </title>
<link href="Style/dangky.css" rel="stylesheet" type="text/css">
<img src="img/Iconn.png">
</head>
<body>
<style>body
		{background-image: url(img/vi-vu-cung-loat-ve-noi-dia-chi-tu-399-000d-chieu-cua-vietnam-airlines.jpg);
		  background-repeat: repeat;
		}
         input
	  {
	   font-size: 20px;
	  }
      .relativetest span{
        position: relative;
        left: 200px;
        height:20px ;
      }
		</style>  
<?php


$connect = mysqli_connect("localhost","root","","thongtinkhachhang");
mysqli_set_charset($connect,'utf8');
if(isset($_POST["submit"]))
{   
    $user_name= mysqli_real_escape_string($connect,$_POST['user_name']);
    $password1 = mysqli_real_escape_string($connect,$_POST['password1']);
    $password2 = mysqli_real_escape_string($connect,$_POST['password2']);
    $phone= mysqli_real_escape_string($connect,$_POST['phone']);
    $email= mysqli_real_escape_string($connect,$_POST['email']);
     $error=array();
     
     if(isset($_POST['user_name']))
      {     
    $sql="SELECT user_name FROM khachhang WHERE user_name='$user_name' " ;
    $query=mysqli_query($connect,$sql);
    $num_row=mysqli_num_rows($query);
    if($num_row!=0)
        {
        $error['user_name']= "Tên đăng nhập đã tồn tại";
        }
     } 
         
    if(isset($_POST['email']))
  {
  


  
    $sql="SELECT email FROM khachhang WHERE email='$email' " ;
    $query=mysqli_query($connect,$sql);
    $num_row=mysqli_num_rows($query);
    if($num_row!=0)
        {
       $error['email'] = "Email đã tồn tại";
        }
    
  
 }
      
if(isset($_POST['phone']))
{
        if(!is_numeric($phone))
        {
            $error="Vui lòng nhập chữ số";
            
        }
}
    
if($password1 != $password2)
        {
      header('Location:loi.php');
         }
 
if(empty($error) && $password1==$password2)
{
    $sql= " INSERT INTO khachhang(user_name,password,email,phone) VALUES('$user_name','$password1','$email','$phone') ";
    $query=mysqli_query($connect,$sql);
     header('Location:index.php ');
} 
}



?>
<form action="" method="post">
<h1 style="color:red;"> 
  <p style="text-align: center" > 
    Đăng ký thành viên mới
  </p>
</h1>

<td>
    <input placeholder="Tên đăng nhập" type="text" name="user_name"  required=""/> 
    <?php
   
if(isset($error['user_name']))
{
?>
<div class="relativetest">
<span style="color: red;font-size: 16px;text-align: center;"><?php echo $error['user_name'] ; ?></span></div>
<?php } ?>
</td>
<td>
    <input placeholder="Email của bạn" type="text" name="email" required=""/>
<?php    
  if(isset($error['email']))
{
?>
<div class="relativetest">
<span style="color: red;font-size: 16px;text-align:center;"><?php echo $error['email'] ; ?></span></div>
<?php } ?>
</td>
<td>
    <input placeholder="Số điện thoại" type="text" name="phone" required=""/>
<?php
     
    
  if(isset($error['phone']))
{
?>
<div class="relativetest">
<span style="color: red;font-size: 16px;text-align: center;"><?php echo $error['phone'] ; ?></span></div>
<?php } ?>  
</td>
<td>
  <input placeholder="Mật khẩu của bạn" type="password" name="password1"  required=""/>
</td>
   <input placeholder="Nhập lại mật khẩu" type="password" name="password2" id="password" required=""/>
<td>
  <button type="submit" name="submit"  >Đăng ký</button>
</td>

</form>


<?php



?>
</body>
</html>
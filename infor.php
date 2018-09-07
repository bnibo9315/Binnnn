
<?php
session_start();
if(isset($_SESSION['user_name'])){
    

?> 

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thông tin khách hàng</title>
<link href="layout/Giaodien1.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style type="text/css">
        .see{
            margin: 20px;
        }
    </style>


</head>

<div id="menu">
  <ul>
    <li>
    <a href="home.php">Trang chủ</a>
    </li>
    <li><a href="#">Giới Thiệu</a>
	     <ul class="sub-menu">	
            <li><a href="#">Thông tin sản phẩm</a></li>
	     	<li><a href="#">Cách thức hoạt động</a></li>
		</ul>
    </li>
    <li><a href="#">Thông tin khách hàng</a>
      	<ul class="sub-menu">
      		<li><a href="" target='_top'>Thông tin khách hàng</a></li>
      	</ul>
    </li>  	
    <li><a href="#">Giao dịch</a>
    	<ul class="sub-menu">  
    		<li><a href="#">Thời gian thuê</a></li>
    		<li><a href="#">Số tiền thanh toán</a></li>
    	</ul>
    </li>
    <li><a href="#">Chủ sở hữu</a>
    	<ul class="sub-menu">
    		<li><a href="https://www.facebook.com/profile.php?id=100009118588864">Facebook</a></li>
    		<li><a href="#">Thông tin chủ sở hữu</a></li>
    	</ul>
    </li>
    <li>
        <ul class="">
            <li> <a href="logout.php">Đăng xuất</a></li>
        </ul>
    </li>
    <li>
        <ul class="">
    
        <a > Xin chào 
                    <?php    
                         echo  $_SESSION['user_name']  ;  
                    ?>
        </a>
        </ul>
    </li>
    
  </ul>
</div>
<body>
<form>

<div class="row text-center">
    <h1>  THÔNG TIN KHÁCH HÀNG</h1>
</div>
<div class="see">

<div  class="row">
    
        <table class="table table-striped">
        <thead>
            <tr>
                <th><i class="fa fa-info-circle" aria-hidden="true"></i> ID :</th>
                <th><i class="fa fa-address-book" aria-hidden="true"></i> Tên đăng nhập :</th>
                <th><i class="fa fa-user-circle-o" aria-hidden="true"></i> Họ và tên :</th>
                <th><i class="fa fa-phone-square" aria-hidden="true"></i> Số điện thoại :</th>
                <th><i class="fa fa-envelope" aria-hidden="true"></i> Email :</th>
                <th> <i class="fa fa-address-card-o" aria-hidden="true"></i> Địa chỉ :</th>
           </tr>
        </thead>
<?php


$connect = mysqli_connect("localhost","root","","thongtinkhachhang");
mysqli_set_charset($connect,'utf8');
    
   $user=$_SESSION['user_name'];

    $result=mysqli_query($connect,"SELECT * FROM khachhang WHERE user_name='$user'");
   
   if($result)
   {
    while($row=mysqli_fetch_row($result)){
        

?> 
<div class="container">
        <tbody>
           <tr>
            <td>  
                <?php
                echo $row[0];               
                 ?>               
            </td>
            <td>
                <?php
                echo $row[1];     
                ?>
            </td>
            <td>
                <?php
               echo $row[2];     
                ?>
            </td>                         
            <td>
                <?php
               echo $row[3];     
                ?>
            </td>
            <td>
                <?php
              echo $row[4];     
                ?>
            </td>
            <td>
                <?php
               echo $row[5];     
                ?>
             </td>   
           </tr>     
        <tr>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td><a href="change.php?id=<?php echo $row[0]?>" ><i class="fa fa-pencil-square-o"></i>Sửa</td>
           <td><a class="erase.php?id=<?php echo $row[0]?>" ><i class="fa fa-trash"></i> Xóa tài khoản</td>
      </tr>
        </tbody>
        </table>
        </div>
 
</div>
</div>
</form>

<?php

          }
    
    mysqli_free_result($result);
    
   }
    

?>



</body>
</html>
<?php
}
else {
    header('Location: index.php');
}

?>

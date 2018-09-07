<?php
session_start();
if(isset($_SESSION['user_name']))
{


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trang Chủ</title>
<link href="trangchu/Giaodien.css" rel="stylesheet" type="text/css">
</head>
<div id="menu">
  <ul>
    <li>
    <a href="" target='_top'>Trang chủ</a>
    </li>
    <li><a href="#">Giới Thiệu</a>
	     <ul class="sub-menu">	
	     	<li><a href="#">Thông tin sản phẩm</a></li>
	     	<li><a href="#">Cách thức hoạt động</a></li>
		</ul>
    </li>
    <li><a href="#">Thông tin khách hàng</a>
      	<ul class="sub-menu">
      		<li><a href="infor.php" >Thông tin khách hàng</a></li>
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
        <ul class="nav navbar-nav nanbar-ex1-collapse">
            <li> <a href="logout.php">Đăng xuất</a></li>
        </ul>
    </li>
    <li>
        <a > Xin chào 
                    <?php    
                         echo  $_SESSION['user_name']  ;  
                    ?>
        </a>
    </li>
   
  </ul>
</div>

<style>
	body{
		background-image: url(trangchu/boeing-_online-video-cutter.com_-_1_.gif);
	}
	
	</style>
<style>
	*{
		margin: 0;
		padding: 0;
	}
	</style>
<body>
</body>
</html>
<?php
}
else
{
    header('Location: index.php');
}

?>
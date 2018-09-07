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
<link href="Style/giaodienchange.css" rel="stylesheet" type="text/css">
<link href="layout/Giaodien1.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style type="text/css">
        .see{
            margin: 20px;
        }
        .button
        {
            margin:20px;
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
        <ul class="">
            <li> <a href="logout.php">Đăng xuất</a></li>
        </ul>
    </li>
    <li>
        <a> Xin chào 
                    <?php    
                         echo  $_SESSION['user_name']  ;  
                    ?>
        </a>
    </li>
   
  </ul>
</div>
<body>














<div class="row text-center">
    <h1> SỬA THÔNG TIN KHÁCH HÀNG</h1>
</div>
<div class="see">
<div  class="row">
    
        <table class="table table-striped">
        <thead>
            <tr>
                <th><i class="fa fa-info-circle" aria-hidden="true"></i>  ID :</th>
                <th><i class="fa fa-address-book" aria-hidden="true"></i> Tên đăng nhập :</th>
                <th><i class="fa fa-user-circle-o" aria-hidden="true"></i> Họ và tên :</th>
                <th> <i class="fa fa-address-card-o" aria-hidden="true"></i> Địa chỉ :</th>
           </tr>
        </thead>
</div>        
</div>
<?php
$connect = mysqli_connect("localhost","root","","thongtinkhachhang");
mysqli_set_charset($connect,'utf8');
$id=$_GET['id'];
$sql="SELECT * FROM khachhang WHERE id='$id' ";
$query=mysqli_query($connect,$sql);
$row=mysqli_fetch_array($query);
if(isset($_POST['submit']))
{ 
    

    
    if(isset($_POST['fullname']))
        {
                     $id=$_GET['id'];
                    $fullname=mysqli_real_escape_string($connect,$_POST['fullname']);
                   
                    $sql2=" UPDATE khachhang SET fullname='$fullname' WHERE id='$id'";
                    $query1=mysqli_query($connect,$sql2);
        }  
       
    if(isset($_POST['address']))
        {              $address=mysqli_real_escape_string($connect,$_POST['address']);
                     $id=$_GET['id'];
                     
                    $sql4="UPDATE khachhang SET address='$address' WHERE id='$id'";
                    $query=mysqli_query($connect,$sql4);
        }   
       
    if(empty($_POST['user_name']))
    {
        
    }
    else
        {
                    
                    if($row['user_name']==$username)
                     {
                          header('Location: home.php');
                     }
                    else
                    {
                        $username=mysqli_real_escape_string($connect,$_POST['user_name']);
                        $id=$_GET['id'];
                     $sql2="UPDATE khachhang SET user_name='$username' WHERE id='$id'";
                     $query=mysqli_query($connect,$sql2);
                     if($query)
                     {
                        unset($_SESSION['user_name']);
                        header('Location: index.php');
                     }
                     
                     
                    }
       }             
              
}
?>
<form action="" method="post">
<div class="row">   

    <tbody>
        <tr>
            <td>
             
            </td>
            <td>
              <div >
                    
                        <input  placeholder="" type="text" name="user_name" />
                    
                </div>
                

            </td>
            <td>
            <div >
                   
                        <input  placeholder="" type="text" name="fullname" />
                    
                </div>
            </td> 
            <td>
            <div >
                    
                        <input placeholder="" type="text" name="address" />
                    
                </div>
            </td>
        </tr>
    </tbody>  

</div>

<div class="row">  
    <div class="button">       
  
            <button onclick="alert('Chúc mừng bạn đã cập nhật thành công')" type="submit" name="submit" class="btn btn-info active">Sửa</button>
        
    </div> 
 </div> 
</form> 
<?php
   

?>




</body>
</html>
<?php

}
else {
    header('Location: index.php');
}

?>
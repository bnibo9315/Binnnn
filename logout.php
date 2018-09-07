
<?php
session_start();
if(isset($_SESSION['user_name'])){
 
   //ki?m tra n?u có session tên us thì xóa nó di
    
  unset($_SESSION['user_name']);
  header('Location: index.php');
}
    else 
    {
        header('Location: index.php');
    }
?>

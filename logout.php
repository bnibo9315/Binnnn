
<?php
session_start();
if(isset($_SESSION['user_name'])){
 
   //ki?m tra n?u c� session t�n us th� x�a n� di
    
  unset($_SESSION['user_name']);
  header('Location: index.php');
}
    else 
    {
        header('Location: index.php');
    }
?>

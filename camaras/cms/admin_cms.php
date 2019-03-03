<?php  session_start();

if(isset($_SESSION['usuario'])){
    require 'views/admin_cms.views.php';
}else{
    header('Location: login.php');
}
?>



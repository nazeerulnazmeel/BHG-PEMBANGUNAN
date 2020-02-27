<?php
   require '../includes/db.inc.php';
   session_start();
   
   if(isset($_SESSION['login_user'])){
      header("Location: index.php");
      die();
   }
   else {
      header("Location: dashboard.php");
   }
?>
<?php

if (isset($_POST['login-submit'])) {

   require '../includes/db.inc.php';

   $usrname = $_POST['username'];
   $passwd = $_POST['password'];

   if (empty($usrname) || empty($passwd)) {
      header("Location: index.php?error=emptyfields");
      exit();
   } 
   else {
      $sql = "SELECT * FROM administrator WHERE adm_usrname=?";
      $stmt = mysqli_stmt_init($db);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("Location: index.php?error=sqlerror");
         exit();
      }
      else {
         mysqli_stmt_bind_param($stmt, "s", $usrname);
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);

         if($row = mysqli_fetch_assoc($result)){
            $pwdCheck = password_verify($passwd, $row['adm_passwd']);
            if ($pwdCheck == false) {
               header("Location: index.php?error=wrongpassword");
               exit();
            }
            else if ($pwdCheck == true) {
               session_start();
               $_SESSION[] = $row['uid'];
               $_SESSION[] = $row['adm_usrname'];

               header("Location: dashboard.php");
               exit();
            }
            else {
               header("Location: index.php?error=wrongpassword");
               exit();
            }
         }
         else {
            header("Location: index.php?error=nouser");
            exit();
         }
      }
   }
} else {
   header("Location: index.php");
   exit();
}
   
   // if($_SERVER["REQUEST_METHOD"] == "POST") {
   //    // username and password sent from form 
      
   //    $myusername = mysqli_real_escape_string($db,$_POST['username']);
   //    $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
   //    $sql = "SELECT= * FROM admin WHERE adm_usrname = '$myusername' and adm_passwd = '$mypassword'";
   //    $result = mysqli_query($db,$sql);
   //    // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   //    // $active = $row['active'];
      
   //    $count = mysqli_num_rows($result);
      
   //    // If result matched $myusername and $mypassword, table row must be 1 row
		
   //    if($count == 1) {
   //       $_SESSION['login_user'] = $myusername;
         
   //       header("location: login.php?username=$myusername");
   //    }else {
   //       $error = "Your Login Name or Password is invalid";
   //    }
   // }

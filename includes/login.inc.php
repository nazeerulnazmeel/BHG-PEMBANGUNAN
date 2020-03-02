<?php

if (isset($_POST['penilai-login'])) {

   require 'db.inc.php';

   $kad_pengenalan = $_POST['kad_pengenalan'];
   $passwd = $_POST['password'];

   if (empty($kad_pengenalan) || empty($passwd)) {
      header("Location: ../login.php?error=emptyfields");
      exit();
   } 
   else {
      $sql = "SELECT * FROM penilai WHERE kad_pengenalan=?";
      $stmt = mysqli_stmt_init($db);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("Location: login.php?error=sqlerror");
         exit();
      }
      else {
         mysqli_stmt_bind_param($stmt, "s", $kad_pengenalan);
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);

         if($row = mysqli_fetch_assoc($result)){
            $pwdCheck = password_verify($passwd, $row['passwd']);
            if ($pwdCheck == false) {
               header("Location: ../login.php?error=wrongpassword");
               exit();
            }
            else if ($pwdCheck == true) {
               session_start();
               $_SESSION[] = $row['uid'];
               $_SESSION[] = $row['kad_pengenalan'];
               $_SESSION[] = $row['unit_id'];

               header("Location: ../senaraipegawai.php");
               exit();
            }
            else {
               header("Location: ../login.php?error=wrongpassword");
               exit();
            }
         }
         else {
            header("Location: ../login.php?error=nouser");
            exit();
         }
      }
   }
} else {
   header("Location: ../login.php");
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

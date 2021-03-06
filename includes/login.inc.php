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
      // $sql = "SELECT * FROM penilai WHERE kad_pengenalan=?";
      $sql = "SELECT pegawai.uid, pegawai.nama, pegawai.jawatan, pegawai.gred, pegawai.cawangan_id, pegawai.unit_id, pegawai.access_id, penilai.passwd, penilai.pegawai_id, cawangan.nama_cawangan FROM (pegawai INNER JOIN penilai ON pegawai.uid=penilai.pegawai_id) INNER JOIN cawangan ON pegawai.cawangan_id=cawangan.uid WHERE kad_pengenalan=?";
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
            $accessCheck = $row['access_id'];
            if ($accessCheck != 2 &&  $accessCheck != 1) {
               header("Location: ../login.php?error=accessdenied");
               exit();
            }
            if ($pwdCheck == false) {
               header("Location: ../login.php?error=wrongpassword");
               exit();
            }
            else if ($pwdCheck == true && ($accessCheck == 1 || $accessCheck == 2 || $accessCheck == 3 || $accessCheck == 4)) {
               session_start();
               $_SESSION['logged-in'] = true;
               $_SESSION['uid'] = $row['pegawai_id'];
               $_SESSION['nama'] = $row['nama'];
               $_SESSION['jawatan'] = $row['jawatan'];
               $_SESSION['gred'] = $row['gred'];
               $_SESSION['unit_id'] = $row['unit_id'];
               $_SESSION['cawangan_id'] = $row['cawangan_id'];
               $_SESSION['nama_cawangan'] = $row['nama_cawangan'];
               $_SESSION['access_id'] = $row['access_id'];

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

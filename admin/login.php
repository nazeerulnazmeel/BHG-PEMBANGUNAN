<?php

   //  session_start();
    require('../includes/db.inc.php');
   
   // if($_SERVER["REQUEST_METHOD"] == "POST") {
   //    // username and password sent from form 
      
   //    $username = mysqli_real_escape_string($db,$_POST['username']);
   //    $password = mysqli_real_escape_string($db,$_POST['password']);
   //    // $passhash = md5($password);
      
   //    $sql = "SELECT * FROM administrator WHERE adm_usrname = '$username' and adm_passwd = '$password'";
   //    $result = mysqli_query($db,$sql);

   //    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   //    $active = $row['active'];

      
   //    $count = mysqli_num_rows($result);
      
   //    // If result matched $myusername and $mypassword, table row must be 1 row
		
   //    if($count == 1) {
   //       session_register("username");
   //       $_SESSION['login_user'] = $username;
         
   //       header("Location: dashboard.html");
   //    }else {
   //       $error = "Your Login Name or Password is invalid";
   //    }
   // }

   if ( !isset($_POST['username'], $_POST['password']) ) {
      // Could not get the data that should have been sent.
      die ('Please fill both the username and password field!');
   }
?>
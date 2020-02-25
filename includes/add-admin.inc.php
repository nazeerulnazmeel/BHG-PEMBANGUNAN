<?php

if (isset($_POST['admin-submit'])) {
    require 'db.inc.php';

    $usrname = $_POST['username'];
    $passwd = $_POST['password'];

    if (empty($usrname) || empty($passwd)) {
        header("Location: ../admin/add-admin.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT adm_usrname FROM administrator WHERE adm_usrname=?";
        $stmt = mysqli_stmt_init($db);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../admin/add-admin.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $usrname);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../admin/add-admin.php?error=usertaken");
                exit();
            } else {
                $sql = "INSERT INTO administrator (adm_usrname, adm_passwd) VALUES (?,?)";

                $stmt = mysqli_stmt_init($db);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../admin/add-admin.php?error=sqleeror");
                    exit();
                }
                else {
                    $passwdHashed = password_hash($passwd, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ss", $usrname, $passwdHashed);
                    mysqli_stmt_execute($stmt);
                    
                    header("Location: ../admin/add-admin.php?add=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($db);
}
else {
    header("Location: ../admin/add-admin.php");
    exit();
}

?>
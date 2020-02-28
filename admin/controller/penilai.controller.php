<?php

if (isset($_POST['tambah-penilai'])) {
    require '../../includes/db.inc.php';

    $kad_pengenalan = $_POST['kad_pengenalan'];
    $passwd = $_POST['password'];
    $nama = $_POST['nama'];
    $jawatan = $_POST['jawatan'];
    $gred = $_POST['gred'];

    if (empty($kad_pengenalan) || empty($passwd) || empty($nama) || empty($jawatan) || empty($gred)) {
        header("Location: ../tambah-penilai.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM penilai WHERE kad_pengenalan=?";
        $stmt = mysqli_stmt_init($db);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../tambah-penilai.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $kad_pengenalan);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if($resultCheck >0) {
                header("Location: ../tambah-penilai.php?error=userexists");
                exit();
            }
            else {
                $sql = "INSERT INTO penilai (kad_pengenalan, passwd, nama, jawatan, gred) VALUES (?,?,?,?,?) ";
                $stmt = mysqli_stmt_init($db);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../tambah-penilai.php?error=sqlerror");
                    exit();
                }
                else {
                    $passwdHashed = password_hash($passwd, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssss", $kad_pengenalan, $passwdHashed, $nama, $jawatan, $gred);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../penilai.php?add=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($db);
}
else {
    header("Location: ../tambah-penilai.php");
    exit();
}
<?php

if (isset($_POST['tambah-pegawai'])) {
    require '../../includes/db.inc.php';

    $kad_pengenalan = $_POST['kad_pengenalan'];
    $nama = $_POST['nama'];
    $jawatan = $_POST['jawatan'];
    $gred = $_POST['gred'];
    $cawangan = $_POST['cawangan'];
    $unit = $_POST['unit'];

    if (empty($kad_pengenalan) || empty($nama) || empty($jawatan) || empty($gred) || empty($cawangan) || empty($unit)) {
        header("Location: ../edit-pegawai.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM pegawai WHERE kad_pengenalan=?";
        $stmt = mysqli_stmt_init($db);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../edit-pegawai.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $kad_pengenalan);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if($resultCheck >0) {
                header("Location: ../edit-pegawai.php?error=userexists");
                exit();
            }
            else {
                $sql = "INSERT INTO pegawai (kad_pengenalan, nama, jawatan, gred, cawangan, unit) VALUES (?,?,?,?,?,?) ";
                $stmt = mysqli_stmt_init($db);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../edit-pegawai.php?error=sqlerror");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "ssssss", $kad_pengenalan, $nama, $jawatan, $gred, $cawangan, $unit);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../edit-pegawai.php?add=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($db);
}
else {
    header("Location: ../edit-pegawai.php");
    exit();
}
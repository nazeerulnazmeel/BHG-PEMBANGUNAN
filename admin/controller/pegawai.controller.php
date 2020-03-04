<?php

if (isset($_POST['tambah-pegawai'])) {
    require '../../includes/db.inc.php';

    $kad_pengenalan = $_POST['kad_pengenalan'];
    $nama = $_POST['nama'];
    $jawatan = $_POST['jawatan'];
    $gred = $_POST['gred'];
    $kumpulan = $_POST['kumpulan'];
    $cawangan = $_POST['cawangan'];
    $unit = $_POST['unit'];

    if (empty($kad_pengenalan) || empty($nama) || empty($jawatan) || empty($gred) || empty($kumpulan) || empty($cawangan) || empty($unit)) {
        header("Location: ../tambah-pegawai.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM pegawai WHERE kad_pengenalan=?";
        $stmt = mysqli_stmt_init($db);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../tambah-pegawai.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $kad_pengenalan);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                header("Location: ../tambah-pegawai.php?error=userexists");
                exit();
            } else {
                $sql = "INSERT INTO pegawai (kad_pengenalan, nama, jawatan, gred, cawangan_id, unit_id, kumpulan_id) VALUES (?,?,?,?,?,?,?) ";
                $stmt = mysqli_stmt_init($db);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../tambah-pegawai.php?error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ssssiii", $kad_pengenalan, $nama, $jawatan, $gred, $cawangan, $unit, $kumpulan);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../pegawai.php?add=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($db);
} else if (isset($_POST['edit-pegawai'])) {
    require '../../includes/db.inc.php';

    $user_id = $_POST['id'];
    $kad_pengenalan = $_POST['kad_pengenalan'];
    $nama = $_POST['nama'];
    $jawatan = $_POST['jawatan'];
    $gred = $_POST['gred'];
    $kumpulan = $_POST['kumpulan'];
    $cawangan = $_POST['cawangan'];
    $unit = $_POST['unit'];
    $access = $_POST['access'];
    $passwd = $_POST['password'];

    $sql = "UPDATE pegawai SET kad_pengenalan=?, nama=?, jawatan=?, gred=?, cawangan_id=?, unit_id=?, kumpulan_id=?, access_id=? WHERE pegawai.uid=$user_id";
    $sql2 = "INSERT INTO penilai (passwd, pegawai_id) VALUES (?,?)";
    $stmt = mysqli_stmt_init($db);
    $stmt2 = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $sql) || !mysqli_stmt_prepare($stmt2, $sql2)) {
        header("Location: ../pegawai.php?error=sqlerror");
        exit();
    } else {
        $passHashed = password_hash($passwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssssiiii", $kad_pengenalan, $nama, $jawatan, $gred, $cawangan, $unit, $kumpulan, $access);
        mysqli_stmt_bind_param($stmt2, "si", $passHashed, $user_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_execute($stmt2);


        header("Location: ../pegawai.php?update=success");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($db);
}

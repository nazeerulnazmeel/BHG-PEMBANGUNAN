<?php

if (isset($_POST['simpan-penilaian'])) {

    require '../includes/db.inc.php';

    $pegawai_id = $_POST['user_id'];
    $penilai_id = $_POST['penilai_id'];
    $soalan1 = $_POST['soalan-1'];
    $soalan2 = $_POST['soalan-2'];
    $soalan3 = $_POST['soalan-3'];
    $soalan4 = $_POST['soalan-4'];
    $soalan5 = $_POST['soalan-5'];
    $soalan6 = $_POST['soalan-6'];
    $soalan7 = $_POST['soalan-7'];
    $soalan8 = $_POST['soalan-8'];

    // echo $soalan1;
    // echo $soalan2;
    // echo $soalan3;
    // echo $soalan4;
    // echo $soalan5;
    // echo $soalan6;
    // echo $soalan7;
    // echo $soalan8;
    // echo $pegawai_id;
    // echo $penilai_id;

    if (empty($soalan1) || empty($soalan2) || empty($soalan3) || empty($soalan4) || empty($soalan5) || empty($soalan6) || empty($soalan7) || empty($soalan8)) {
        header("Location: ../senaraipegawai.php?error=emptyfields");
        exit();
    } else {

        $markah = (($soalan1 + $soalan2 + $soalan3 + $soalan4 + $soalan5 + $soalan6 + $soalan7 + $soalan8)/80)*100;

        $sql = "INSERT INTO penilaian (pegawai_id, markah, penilai_id) VALUES (?,?,?)";
        $sql2 = "UPDATE pegawai SET status_id=? WHERE pegawai.uid=$pegawai_id";
        $stmt = mysqli_stmt_init($db);
        // $stmt2 = mysqli_stmt_init($db);

        $status_id = 1;

        if (!mysqli_stmt_prepare($stmt, $sql) && !mysqli_stmt_prepare($stmt, $sql2)) {
            header("Location: ../senaraipegawai.php?error=sqlerror");
            exit();
        } else {
            
            mysqli_stmt_bind_param($stmt, "idi", $pegawai_id, $markah, $penilai_id);
            mysqli_stmt_bind_param($stmt, "i", $status_id);
            mysqli_stmt_execute($stmt);
            // mysqli_stmt_execute($stmt2);

            header("Location: ../senaraipegawai.php?evaluate=success");
            exit();
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($db);
}

<?php

require '../../includes/db.inc.php';

if (isset($_POST['cawanganID'])) {
    $cawangan = $_POST['cawanganID'];
    if ($cawangan == "") {
        echo "<option value=''>Pilih unit</option>";
    } else {
        $sql = "SELECT * FROM unit WHERE cawangan_id=$cawangan";
        $result = mysqli_query($db, $sql);
        $resultCheck = mysqli_num_rows($result);
        $output = "<option value=''>Pilih unit</option>";

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $output .= "<option value=" . $row['uid'] . ">" . $row['nama_unit'] . "</option>";
                // echo json_encode($row);
            }
        }
        echo $output;
    }
} else if (isset($_POST['unit_id_pnp'])) {
    $unit_id = $_POST['unit_id_pnp'];

    if($unit_id == "") {
        exit();
    }
    else {
        $sql = "SELECT pegawai.uid, pegawai.nama, pegawai.jawatan, pegawai.gred, pegawai.cawangan_id, pegawai.unit_id, pegawai.kumpulan_id, cawangan.nama_cawangan, unit.nama_unit FROM ((pegawai INNER JOIN cawangan ON pegawai.cawangan_id=cawangan.uid) INNER JOIN unit ON pegawai.unit_id=unit.uid) WHERE unit_id=$unit_id";
        // $sql = "SELECT uid, nama, jawatan, gred FROM pegawai  WHERE unit_id=$unit_id";
        $result = mysqli_query($db, $sql);
        $resultCheck = mysqli_num_rows($result);
    
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
    
                if ($row['kumpulan_id'] == 1) {
                    echo json_encode($row);
                    echo "<tr>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['jawatan'] . " " . $row['gred'] . "</td>";
                    echo "<td>" . $row['nama_cawangan'] . "</td>";
                    echo "<td>" . $row['nama_unit'] . "</td>";
                    echo "<td><a class='btn btn-primary' href='edit-pegawai.php?uid=".$row['uid']."'>Edit</a></td>";
                    echo "</td>";
                }
            }
        }
    }

    
} else if (isset($_POST['unit_id_pel'])) {
    $unit_id = $_POST['unit_id_pel'];

    if ($unit_id == "") {
        exit();
    }
    else {
        $sql = "SELECT pegawai.uid, pegawai.nama, pegawai.jawatan, pegawai.gred, pegawai.cawangan_id, pegawai.unit_id, pegawai.kumpulan_id, cawangan.nama_cawangan, unit.nama_unit FROM ((pegawai INNER JOIN cawangan ON pegawai.cawangan_id=cawangan.uid) INNER JOIN unit ON pegawai.unit_id=unit.uid) WHERE unit_id=$unit_id";
        // $sql = "SELECT uid, nama, jawatan, gred FROM pegawai  WHERE unit_id=$unit_id";
        $result = mysqli_query($db, $sql);
        $resultCheck = mysqli_num_rows($result);
    
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
    
                if ($row['kumpulan_id'] == 2) {
                    echo json_encode($row);
                    echo "<tr>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['jawatan'] . " " . $row['gred'] . "</td>";
                    echo "<td>" . $row['nama_cawangan'] . "</td>";
                    echo "<td>" . $row['nama_unit'] . "</td>";
                    echo "<td><a class='btn btn-primary' href='edit-pegawai.php?uid=".$row['uid']."'>Edit</a></td>";
                    echo "</td>";
                }
            }
        }
    }   
}

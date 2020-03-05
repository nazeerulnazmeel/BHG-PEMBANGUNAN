<?php
session_start();
if (!empty($_SESSION['uid'])) {
    
}
else {
    header ("Location: login.php");
}
include 'includes/header.usr.inc.php';

require 'includes/db.inc.php';

$pegawai_id = $_SESSION['uid'];
$unit_id = $_SESSION['unit_id'];
$cawangan_id = $_SESSION['cawangan_id'];
$access_id = $_SESSION['access_id'];
?>
<div class="container">
    <h4 style="margin-top: 20px;">Selamat Datang <?php echo $_SESSION['nama']; ?></h4>
    <h6 style="color: rgb(101,102,103);"><?php echo $_SESSION['jawatan']." ".$_SESSION['gred']; ?></h6>
    
    <div class="table-responsive" style="margin: 0px;margin-top: 50px;">
    <h5><?php echo $_SESSION['nama_cawangan']; ?></h5>
        <table class="table">
            <thead>
                <tr>
                    <th class="table-active">Nama</th>
                    <th class="table-active">Jawatan &amp; Gred</th>
                    <th class="table-active">Unit</th>
                    <th class="table-active">Status</th>
                </tr>
            </thead>
            <tbody id="senarai-pegawai">
                <?php

                if ($access_id == 1) {
                    $sql = "SELECT pegawai.uid, pegawai.nama, pegawai.jawatan, pegawai.gred, pegawai.cawangan_id, pegawai.unit_id, pegawai.kumpulan_id, pegawai.status_id, unit.nama_unit FROM (pegawai INNER JOIN unit ON pegawai.unit_id=unit.uid) WHERE pegawai.cawangan_id=$cawangan_id AND pegawai.kumpulan_id=1 AND pegawai.uid!=$pegawai_id";
                }
                else if ($access_id == 2) {
                    $sql = "SELECT pegawai.uid, pegawai.nama, pegawai.jawatan, pegawai.gred, pegawai.cawangan_id, pegawai.unit_id, pegawai.kumpulan_id, pegawai.status_id, unit.nama_unit FROM (pegawai INNER JOIN unit ON pegawai.unit_id=unit.uid) WHERE pegawai.unit_id=$unit_id AND pegawai.kumpulan_id=2";
                }
                // $sql = "SELECT * from ((pegawai INNER JOIN cawangan ON pegawai.cawangan_id=cawangan.uid) INNER JOIN unit ON pegawai.unit_id=unit.uid)";
                $result = mysqli_query($db, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // echo "<option value='" . $row['uid'] . "'>" . $row['nama_cawangan'] . "</option>";
                        echo "<tr>";
                        echo "<td>".$row['nama']."</td>";
                        echo "<td>".$row['jawatan']." ". $row['gred']."</td>";
                        echo "<td>".$row['nama_unit']."</td>";
                        // echo "<td><button class='btn btn-danger' type='button' style='width: 117px;'>Belum dinilai</button></td>";
                        if ($row['status_id'] == 0){
                            echo "<td><a class='btn btn-danger' href='penilaian.php?uid=".$row['uid']."'>Belum dinilai</a></td>";
                        }else {
                            echo "<td><a class='btn btn-success'>Sudah dinilai</a></td>";
                        }                      
                        echo "</tr>";
                        
                    }
                }
                ?>
                <!-- <tr>
                    <td>Tobrani bin Kamisan</td>
                    <td>PPT N32</td>
                    <td><button class="btn btn-danger" type="button" style="width: 117px;">Belum dinilai</button></td>
                </tr>
                <tr>
                    <td>Khalid bin Jamlus</td>
                    <td>PT N17</td>
                    <td><button class="btn btn-success" type="button" style="width: 117px;">Telah dinilai</button></td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>

<?php
include 'includes/footer.usr.inc.php';
?>
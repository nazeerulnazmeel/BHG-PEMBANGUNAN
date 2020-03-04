<?php
session_start();
include 'includes/header.usr.inc.php';

require 'includes/db.inc.php';

$unit_id = $_SESSION['unit_id'];
?>
<div class="container">
    <h4 style="margin-top: 20px;">Selamat Datang <?php echo $_SESSION['nama']; ?></h4>
    <h6 style="color: rgb(101,102,103);"><?php echo $_SESSION['jawatan']." ".$_SESSION['gred']; ?></h6>
    <div class="table-responsive" style="margin: 0px;margin-top: 50px;">
        <table class="table">
            <thead>
                <tr>
                    <th class="table-active">Nama</th>
                    <th class="table-active">Jawatan &amp; Gred</th>
                    <th class="table-active">Status</th>
                </tr>
            </thead>
            <tbody id="senarai-pegawai">
                <?php

                $sql = "SELECT * from pegawai WHERE unit_id=$unit_id AND kumpulan_id=2";
                $result = mysqli_query($db, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // echo "<option value='" . $row['uid'] . "'>" . $row['nama_cawangan'] . "</option>";
                        echo "<tr>";
                        echo "<td>".$row['nama']."</td>";
                        echo "<td>".$row['jawatan']." ". $row['gred']."</td>";
                        echo "<td><button class='btn btn-danger' type='button' style='width: 117px;'>Belum dinilai</button></td>";
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
<?php
session_start();
include 'include/header.inc.php';
require '../includes/db.inc.php';

$sql = "SELECT * FROM ((pegawai INNER JOIN cawangan ON pegawai.cawangan_id=cawangan.uid) INNER JOIN unit ON pegawai.unit_id=unit.uid) WHERE (access_id=1 OR access_id=2 OR access_id=3 OR access_id=4) ORDER BY unit_id";
$result = mysqli_query($db, $sql);
$resultCheck = mysqli_num_rows($result);
?>

<div>
    <div class="container">
        <h4>Senarai Penilai</h4>
        <!-- <a name="" id="" class="btn btn-primary" href="tambah-penilai.php" role="button">Tambah Penilai</a> -->

    </div>
    <div class="container" id="senarai-pegawai">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Jawatan &amp; Gred</th>
                        <th>Cawangan</th>
                        <th>Unit</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="penilai">
                    <?php
                    if ($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['nama'] . "</td>";
                            echo "<td>" . $row['jawatan'] . " " . $row['gred'] . "</td>";
                            echo "<td>" . $row['nama_cawangan'] . "</td>";
                            echo "<td>" . $row['nama_unit'] . "</td>";
                            echo "<td>Test</td>";
                            echo "</td>";
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?php
include 'include/footer.inc.php';
?>
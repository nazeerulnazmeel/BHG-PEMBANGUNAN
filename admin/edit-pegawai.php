<?php
session_start();
require '../includes/db.inc.php';
include 'include/header.inc.php';

$user_id = $_GET['uid'];
// $sql = "SELECT * FROM pegawai WHERE uid=$user_id";
$sql = "SELECT * FROM (((pegawai INNER JOIN cawangan ON pegawai.cawangan_id=cawangan.uid) INNER JOIN unit ON pegawai.unit_id=unit.uid) INNER JOIN kategori ON pegawai.kumpulan_id=kategori.uid) WHERE pegawai.uid=$user_id";
$sql2 = "SELECT * FROM unit";

$result = mysqli_query($db, $sql);
$result2 = mysqli_query($db, $sql2);

$resultCheck = mysqli_num_rows($result);
$resultCheck2 = mysqli_num_rows($result2);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {


?>

        <div class="container">
            <h3>Edit Pegawai</h3>
            <form action="controller/pegawai.controller.php" method="post">
                <div class="form-group"><label>Nama</label><input class="form-control" type="text" name="nama" placeholder="<?php echo $row['nama']; ?>"></div>
                <div class="form-group"><label>No. Kad Pengenalan</label><input class="form-control" type="text" name="kad_pengenalan" placeholder="<?php echo $row['kad_pengenalan']; ?>"></div>
                <div class="form-group"><label>Jawatan</label><input class="form-control" type="text" name="jawatan" placeholder="<?php echo $row['jawatan']; ?>"></div>
                <div class="form-group"><label>Gred</label><input class="form-control" type="text" name="gred" placeholder="<?php echo $row['gred']; ?>"></div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Kumpulan</label>
                    <select class="form-control" name="kumpulan">
                        <option selected><?php echo $row['nama_kumpulan']; ?></option>
                        <option value="1">Pengurusan &amp; Profesional</option>
                        <option value="2">Pelaksana</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Cawangan</label>
                    <select id="pilih-cawangan" class="form-control" name="cawangan">
                        <option selected><?php echo $row['nama_cawangan']; ?></option>
                        <option value="1">Cawangan Pengurusan Projek 1</option>
                        <option value="2">Cawangan Pengurusan Projek 2</option>
                        <option value="3">Cawangan Pengurusan Sumber</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Unit</label>
                    <select id="tunjuk-unit" class="form-control" name="unit">
                        <option selected><?php echo $row['nama_unit']; ?></option>
                        <?php
                            if ($resultCheck2 > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    echo "<option value='".$row2['uid']."'>".$row2['nama_unit']."</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit" name="edit-pegawai">Simpan</button>
            </form>
        </div>

<?php
    }
}
include 'include/footer.inc.php';
?>
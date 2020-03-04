<?php
session_start();
require '../includes/db.inc.php';
include 'include/header.inc.php';

$user_id = $_GET['uid'];
// $sql = "SELECT * FROM pegawai WHERE uid=$user_id";
$sql = "SELECT * FROM ((((pegawai INNER JOIN cawangan ON pegawai.cawangan_id=cawangan.uid) INNER JOIN unit ON pegawai.unit_id=unit.uid) INNER JOIN kategori ON pegawai.kumpulan_id=kategori.uid) INNER JOIN access_control ON pegawai.access_id=access_control.uid) WHERE pegawai.uid=$user_id";
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
                <div class="form-group"><input class="form-control" type="hidden" name="id" value="<?php echo $user_id; ?>"></div>
                <div class="form-group"><label>Nama</label><input class="form-control" type="text" name="nama" value="<?php echo $row['nama']; ?>"></div>
                <div class="form-group"><label>No. Kad Pengenalan</label><input class="form-control" type="text" name="kad_pengenalan" value="<?php echo $row['kad_pengenalan']; ?>"></div>
                <div class="form-group"><label>Jawatan</label><input class="form-control" type="text" name="jawatan" value="<?php echo $row['jawatan']; ?>"></div>
                <div class="form-group"><label>Gred</label><input class="form-control" type="text" name="gred" value="<?php echo $row['gred']; ?>"></div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Kumpulan</label>
                    <select class="form-control" name="kumpulan">
                        <?php echo "<option selected value='" . $row['kumpulan_id'] . "'>" . $row['nama_kumpulan'] . "</option>"; ?>
                        <option value="1">Pengurusan &amp; Profesional</option>
                        <option value="2">Pelaksana</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Cawangan</label>
                    <select id="pilih-cawangan" class="form-control" name="cawangan">
                        <?php echo "<option selected value='" . $row['cawangan_id'] . "'>" . $row['nama_cawangan'] . "</option>"; ?>
                        <option value="1">Cawangan Pengurusan Projek 1</option>
                        <option value="2">Cawangan Pengurusan Projek 2</option>
                        <option value="3">Cawangan Pengurusan Sumber</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Unit</label>
                    <select id="tunjuk-unit" class="form-control" name="unit">
                        <?php echo "<option selected value='" . $row['unit_id'] . "'>" . $row['nama_unit'] . "</option>"; ?>
                        <?php
                        if ($resultCheck2 > 0) {
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo "<option value='" . $row2['uid'] . "'>" . $row2['nama_unit'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenis Akses</label>
                    <select id="access-ctrl" class="form-control" name="access">
                        <?php echo "<option selected value='" . $row['access_id'] . "'>" . $row['access_type'] . "</option>"; ?>
                        <option value="1">Penilai</option>
                        <option value="2">Bukan Penilai</option>
                    </select>
                </div>

                <div class="modal fade" id="passwd-popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Katalaluan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Katalaluan</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                                <!-- <button type="submit" class="btn btn-primary" name="tambah-password">Save changes</button> -->
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" name="edit-pegawai">Simpan</button>
            </form>
        </div>

<?php
    }
}
include 'include/footer.inc.php';
?>
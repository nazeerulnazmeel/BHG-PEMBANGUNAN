<?php
session_start();
include 'include/header.inc.php';
?>

<div class="container">
    <h3>Tambah Cawangan &amp; Unit</h3>
    <form action="controller/pegawai.controller.php" method="post">
        <div class="form-group"><label>Cawangan</label><input class="form-control" type="text" name="cawangan" placeholder="Cawangan Pengurusan Sumber"></div>
        <div class="form-group"><label>Unit</label><input class="form-control" type="text" name="unit" placeholder="Unit Kewangan"></div>
        <button class="btn btn-primary" type="submit" name="tambah-cawangan">Simpan</button>
    </form>
</div>

<?php
include 'include/footer.inc.php';
?>
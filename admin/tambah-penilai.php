<?php
session_start();
include 'include/header.inc.php';
?>

<div class="container">
    <h3>Tambah Penilai</h3>
    <form action="controller/penilai.controller.php" method="post">
        <div class="form-group"><label>Nama</label><input class="form-control" type="text" name="nama" placeholder="Ahmad Albab"></div>
        <div class="form-group"><label>Katalaluan</label><input class="form-control" type="password" name="password" placeholder="Masukkan katalaluan "></div>
        <div class="form-group"><label>No. Kad Pengenalan</label><input class="form-control" type="text" name="kad_pengenalan" placeholder="810523025322"></div>
        <div class="form-group"><label>Jawatan</label><input class="form-control" type="text" name="jawatan" placeholder="KPSU"></div>
        <div class="form-group"><label>Gred</label><input class="form-control" type="text" name="gred" placeholder="M48"></div>
        
        <button class="btn btn-primary" type="submit" name="tambah-penilai">Simpan</button>
    </form>
</div>

<?php
include 'include/footer.inc.php';
?>
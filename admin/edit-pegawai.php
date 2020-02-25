<?php
    session_start();
    include 'include/header.inc.php';
?>

<div class="container">
        <h3>Tambah Pegawai</h3>
        <form action="controller/pegawai.controller.php" method="post">
            <div class="form-group"><label>Nama</label><input class="form-control" type="text" name="nama"></div>
            <div class="form-group"><label>No. Kad Pengenalan</label><input class="form-control" type="text" name="kad_pengenalan"></div>
            <div class="form-group"><label>Jawatan</label><input class="form-control" type="text" name="jawatan"></div>
            <div class="form-group"><label>Gred</label><input class="form-control" type="text" name="gred"></div>
            <div class="form-group"><label>Cawangan</label><input class="form-control" type="text" name="cawangan"></div>
            <div class="form-group"><label>Unit</label><input class="form-control" type="text" name="unit"></div>
            <button class="btn btn-primary" type="submit" name="tambah-pegawai">Simpan</button>
        </form>
    </div>
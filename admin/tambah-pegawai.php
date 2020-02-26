<?php
session_start();
include 'include/header.inc.php';
?>

<div class="container">
    <h3>Tambah Pegawai</h3>
    <form action="controller/pegawai.controller.php" method="post">
        <div class="form-group"><label>Nama</label><input class="form-control" type="text" name="nama" placeholder="Ahmad Albab"></div>
        <div class="form-group"><label>No. Kad Pengenalan</label><input class="form-control" type="text" name="kad_pengenalan" placeholder="810523025322"></div>
        <div class="form-group"><label>Jawatan</label><input class="form-control" type="text" name="jawatan" placeholder="PTD"></div>
        <div class="form-group"><label>Gred</label><input class="form-control" type="text" name="gred" placeholder="M48"></div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Kumpulan</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option>Pilih kumpulan</option>
                <option>Pengurusan &amp; Profesional</option>
                <option>Pelaksana</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Cawangan</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option>Pilih cawangan</option>
                <option>Cawangan Pengurusan Projek 1</option>
                <option>Cawangan Pengurusan Projek 2</option>
                <option>Cawangan Pengurusan Sumber</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Unit</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option>Pilih unit</option>
                <option>Unit Tanah</option>
                <option>Unit Public Private Partnership</option>
            </select>
        </div>
        <button class="btn btn-primary" type="submit" name="tambah-pegawai">Simpan</button>
    </form>
</div>

<?php
include 'include/footer.inc.php';
?>
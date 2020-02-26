<?php
session_start();
include 'include/header.inc.php';
?>

<div>
    <div class="container">
        <h4>Senarai Pegawai</h4>
        <a name="" id="" class="btn btn-primary" href="tambah-pegawai.php" role="button">Tambah Pegawai</a>
        <form action="" method="post">
            <div class="form-group">
            <label for="exampleFormControlSelect1">Cawangan</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option>Cawangan Pengurusan Projek 1</option>
                <option>Cawangan Pengurusan Projek 2</option>
                <option>Cawangan Pengurusan Sumber</option>
            </select>
            </div>
            <div class="form-group">
            <label for="exampleFormControlSelect1">Unit</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option>Unit Tanah</option>
                <option>Unit Public Private Partnership</option>
                <option>Unit Penyelarasan</option>
                <option>Unit Kewangan Pentadbiran</option>
            </select>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="table-responsive">
            <h5>Kumpulan Pengurusan &amp; Profesional</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jawatan &amp; Gred</th>
                        <th>Cawangan</th>
                        <th>Unit</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ahmad Albab</td>
                        <td>PTD M41</td>
                        <td>Pengurusan Sumber</td>
                        <td>Unit Pentadbiran</td>
                        <td>Cell 3</td>
                    </tr>
                    <tr></tr>
                </tbody>
            </table>
        </div>
        <h5>Kumpulan Pelaksana</h5>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jawatan &amp; Gred</th>
                        <th>Cawangan</th>
                        <th>Unit</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Zaki</td>
                        <td>PT N17</td>
                        <td>Cell 3</td>
                    </tr>
                    <tr></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?php
include 'include/footer.inc.php';
?>
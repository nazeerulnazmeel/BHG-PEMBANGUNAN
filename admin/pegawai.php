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
                <select class="form-control" id="pilih-cawangan">
                    <option value="">Pilih cawangan</option>
                    <?php
                    require '../includes/db.inc.php';
                    /*  When cawangan been selected, it will load all units belong to
                        the cawangan to Unit option below without refreshing the page.

                        This function has been used along with AJAX script which can
                        be found in admin/include/footer.inc.php

                    */
                    $sql = "SELECT * from cawangan";
                    $result = mysqli_query($db, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['uid'] . "'>" . $row['nama_cawangan'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Unit</label>
                <select class="form-control" id="tunjuk-unit">
                    <option value="">Pilih unit</option>
                </select>
            </div>
        </form>
    </div>
    <div class="container" id="senarai-pegawai">
        <div class="table-responsive">
            <h5>Kumpulan Pengurusan &amp; Profesional</h5>
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
                <tbody id="pengurusan">

                </tbody>
            </table>
        </div>
        <h5>Kumpulan Pelaksana</h5>
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Jawatan &amp; Gred</th>
                        <th>Cawangan</th>
                        <th>Unit</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="pelaksana">

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?php
include 'include/footer.inc.php';
?>
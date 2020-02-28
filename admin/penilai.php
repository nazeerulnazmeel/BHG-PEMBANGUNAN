<?php
session_start();
include 'include/header.inc.php';
?>

<div>
    <div class="container">
        <h4>Senarai Penilai</h4>
        <a name="" id="" class="btn btn-primary" href="tambah-penilai.php" role="button">Tambah Penilai</a>

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

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?php
include 'include/footer.inc.php';
?>
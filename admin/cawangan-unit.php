<?php
session_start();
include 'include/header.inc.php';
require '../includes/db.inc.php';
?>

<div>
    <!-- <div class="container">
        <h4>Senarai Cawangan &amp; Unit</h4>
        <a name="" id="" class="btn btn-primary" href="tambah-cawangan-unit.php" role="button">Tambah Cawangan & Unit</a>
    </div> -->
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h4>Senarai Cawangan &amp; Unit</h4>
                <div class="table-responsive">
                    <?php

                    // $sql = "SELECT * from cawangan INNER JOIN unit ON cawangan.uid=unit.cawangan_id GROUP BY nama_cawangan";
                    $sql = "SELECT *, GROUP_CONCAT(DISTINCT nama_unit SEPARATOR ', ') from unit INNER JOIN cawangan ON unit.cawangan_id=cawangan.uid GROUP BY cawangan_id";
                    $result = mysqli_query($db, $sql);
                    $resultCheck =  mysqli_num_rows($result);
                    if ($resultCheck > 0) { ?>
                        <table id="showCawangan" class="table">
                            <thead>
                                <tr>
                                    <th>Cawangan</th>
                                    <th>Unit</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <?php while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td rowspan="4"><?php echo $row['nama_cawangan'];?></td>
                                        <td><?php echo $row["GROUP_CONCAT(DISTINCT nama_unit SEPARATOR ', ')"]; ?></td>
                                        <td><?php echo "<button class='btn btn-info' type='button'>Edit</button>" ?></td>
                                    </tr>
                                </tbody>
                        <?php     }
                        } ?>
                        </table>
                </div>
            </div>
            <!-- <div class="col-md-5">
                <h4>Tambah Cawangan &amp; Unit</h4>
                <form action="controller/pegawai.controller.php" method="post">
                    <div class="form-group"><label>Cawangan</label><input class="form-control" type="text" name="nama" placeholder="Cawangan Pengurusan Sumber"></div>
                    <div class="form-group"><label>Unit</label><input class="form-control" type="text" name="nama" placeholder="Unit Kewangan"></div>
                    <button class="btn btn-primary" type="submit" name="tambah-pegawai">Simpan</button>
                </form>
            </div> -->
        </div>

    </div>
</div>
</div>

<?php
include 'include/footer.inc.php';
?>
<?php
session_start();
include 'includes/header.usr.inc.php';
?>
<div class="container">
    <h4 style="margin-top: 20px;">Selamat Datang Abdul Ghoffur bin Mustaffa!</h4>
    <h6 style="color: rgb(101,102,103);">Pegawai Tadbir Diplomatik M54</h6>
    <div class="table-responsive" style="margin: 0px;margin-top: 50px;">
        <table class="table">
            <thead>
                <tr>
                    <th class="table-active">Nama</th>
                    <th class="table-active">Jawatan &amp; Gred</th>
                    <th class="table-active">Status</th>
                </tr>
            </thead>
            <tbody id="senarai-pegawai">
                <?php
                require '../includes/db.inc.php';

                $sql = "SELECT * from pegawai";
                $result = mysqli_query($db, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // echo "<option value='" . $row['uid'] . "'>" . $row['nama_cawangan'] . "</option>";
                        
                    }
                }
                ?>
                <tr>
                    <td>Tobrani bin Kamisan</td>
                    <td>PPT N32</td>
                    <td><button class="btn btn-danger" type="button" style="width: 117px;">Belum dinilai</button></td>
                </tr>
                <tr>
                    <td>Khalid bin Jamlus</td>
                    <td>PT N17</td>
                    <td><button class="btn btn-success" type="button" style="width: 117px;">Telah dinilai</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
include 'includes/footer.usr.inc.php';
?>
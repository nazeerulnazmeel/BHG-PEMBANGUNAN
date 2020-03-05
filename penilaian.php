<?php
session_start();
require 'includes/db.inc.php';

$user_id = $_GET['uid'];
$penilai_id = $_SESSION['uid'];
$sql = "SELECT * FROM ((((pegawai INNER JOIN cawangan ON pegawai.cawangan_id=cawangan.uid) INNER JOIN unit ON pegawai.unit_id=unit.uid) INNER JOIN kategori ON pegawai.kumpulan_id=kategori.uid) INNER JOIN access_control ON pegawai.access_id=access_control.uid) WHERE pegawai.uid=$user_id";

$result = mysqli_query($db, $sql);
$resultCheck = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>PEGAWAI BULANAN</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button-1.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div></div>
    <div class="container">
        <?php
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<h3>Calon: " . $row['nama'] . "</h3>";
                echo "<h5>Jawatan: " . $row['jawatan'] . " " . $row['gred'] . "</h5>";
            }
        }
        ?>
        <!-- <h3>Calon: Mohammad Bazli</h3>
        <h5>Jawatan:</h5> -->
    </div>
    <div class="container">
        <div class="table-responsive table-bordered border-light">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Tahap</th>
                        <th colspan="2" style="width: 110px;">Lemah</th>
                        <th colspan="2" style="width: 110px;">Kurang Memuaskan</th>
                        <th colspan="2" style="width: 110px;">Sederhana</th>
                        <th colspan="2" style="width: 110px;">Baik</th>
                        <th colspan="2" style="width: 110px;">Cemerlang</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Skala</strong></td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                    </tr>
                    <tr></tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container">
        <form action="includes/penilaian.inc.php" method="post">
            <div class="form-group">
                <input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id; ?>">
                <?php echo $user_id; ?>
            </div>
            <div class="form-group">
                <input type="hidden" name="penilai_id" class="form-control" value="<?php echo $penilai_id; ?>">
                <?php echo $penilai_id; ?>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 50px;">Kod</th>
                            <th class="text-nowrap" style="width: 130px;max-width: 0px;">Pengukuran</th>
                            <th style="width: 320px;">Definisi</th>
                            <th style="width: 120px;">Markah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Komitmen Terhadap Kerja</td>
                            <td>Memberikan (dari segi pendirian dan perbuatan) sepenuh tenaga, perhatian dan menunjukkan sokongan serta azam yang sepenuhnya semasa melaksanakan sesuatu kerja dan tugasan.</td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control" name="soalan-1" id="">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Kesempurnaan Kerja</td>
                            <td>Menunjukkan inisiatif dalam mencapai kesempurnaan terhadap kerja yang diamanahkan.</td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control" name="soalan-2" id="">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Berdisiplin</td>
                            <td>Kelakuan baik dan berkeupayaan mengawal diri dengan patuh kepada tatatertib dan peraturan yang telah ditetapkan.</td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control" name="soalan-3" id="">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Nilai Tambah</td>
                            <td>Menyumbangkan kepada aspek inovasi dan kreativiti untuk memperbaiki dan memperkemaskan sistem atau proses kerja kepada yang lebih baik.</td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control" name="soalan-4" id="">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Ketepatan Masa</td>
                            <td>Melakasakan sesuatu kerja / tugasan, program, janji dan komitmen mengikut jadual pelaksanaan yang telah ditetapkan.</td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control" name="soalan-5" id="">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Kerjasama</td>
                            <td>Menunjukkan perlakuan bekerja bersama-sama dalam memberi kan sokongan, menyumbang dan bersefahaman.</td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control" name="soalan-6" id="">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Berhemah</td>
                            <td>Mengamalkan budaya yang murni, mempunyai budi pekerti yang mulia seperti jujur, amanah, sederhana, berdedikasi dam beradab.</td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control" name="soalan-7" id="">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Nilai Tambah</td>
                            <td>Melibatkan diri secara aktif serta memberi sokongan sepenuhnya dalam program dan aktiviti yang dianjurkan di peringkat Bahagian / Kementerian.</td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control" name="soalan-8" id="">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div><button class="btn btn-success" type="submit" name="simpan-penilaian">Simpan</button>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>
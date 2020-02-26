<?php
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $time_date = date(' l, d F Y h:i:s A', time());
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>PEGAWAI BULANAN</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="../assets/css/Navigation-with-Button-1.css">
    <link rel="stylesheet" href="../assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="../assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
            <div class="container"><a class="navbar-brand" href="#">Bahagian Pembangunan</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse"
                    id="navcol-1">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="dashboard.php">Home</a></li>
                        <li class="nav-item" role="presentation"></li>
                        <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Edit</a>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" role="presentation" href="pegawai.php">Senarai Pegawai</a>
                                <a class="dropdown-item" role="presentation" href="cawangan-unit.php">Senarai Cawangan &amp; Unit</a>
                                <a class="dropdown-item" role="presentation" href="#">Senarai Jawatan &amp; Gred</a>
                            </div>
                        </li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="penilai.php">Penilai</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#">Borang Penilaian</a></li>
                    </ul><span class="navbar-text actions"> <a class="btn btn-light action-button" role="button" href="#">Logout</a></span></div>
            </div>
        </nav>
    </div>
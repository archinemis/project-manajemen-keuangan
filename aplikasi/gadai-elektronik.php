<?php
    include "config/connection.php";
    session_start();
    if(empty($_SESSION['uname']) && empty($_SESSION['pass'])){
        header("location:login.php");
    }
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gadai Elektronik | Pegadaian Online</title>
    <?php include("get-css.php") ?>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>

<body>
    
    <?php include("nav-top.php") ?>
    
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a data-toggle="tab" href="#Home"><i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="active"><a data-toggle="tab" href="#Interface"><i class="fas fa-hand-holding-usd"></i> Gadai</a>
                        </li>
                        <li><a data-toggle="tab" href="#transaksi"><i class="fas fa-money-check"></i> Transaksi</a>
                        </li>
                        <li><a data-toggle="tab" href="#profile"><i class="far fa-user"></i> Profile</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="index.php">Dashboard</a>
                                </li>
                            </ul>
                        </div>
                        <div id="transaksi" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="ongoing-transaksi.php">Transaksi Sedang Berjalan</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Interface" class="tab-pane active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="gadai-elektronik.php">Elektronik</a>
                                </li>
                            </ul>
                        </div>
                        <div id="profile" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="profile.php">Profile</a>
                                </li>
                                <li><a href="logout.php">Log Out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<?php
        // if (empty($dtKosong['nomorKTP']) || empty($dtKosong['jenisKelamin']) || empty($dtKosong['agama']) || empty($dtKosong['tempatLahir']) || empty($dtKosong['tglLahir']) || empty($dtKosong['provinsiTinggal']) || empty($dtKosong['kabKotTinggal']) || empty($dtKosong['kecTinggal']) || empty($dtKosong['kelurahanTinggal']) || empty($dtKosong['statusMenikah']) || empty($dtKosong['namaIbuKandung'])) {
        //     include("belum-lengkap.php");
        // }else{
            include("content-gadai.php");
        // }
    ?>
    
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018 Kelompok Nyambek
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include("get-js.php") ?>
</body>

</html>
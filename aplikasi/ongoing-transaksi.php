<?php
    include "config/connection.php";
    session_start();
    if(empty($_SESSION['uname']) && empty($_SESSION['pass'])){
        header("location:login.php");
    }
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Transaksi Berjalan | Pegadaian Online</title>
    <?php include("get-css.php") ?>
</head>

<body>
    <?php 
        if (!empty($_SESSION['upload']) && $_SESSION['upload'] == "sukses") {
    ?>
        <script>
            swal("Bukti transfer berhasil di upload", "Silahkan menunggu untuk di konfirmasi", "success")
        </script>
    <?php
        }
        unset($_SESSION['upload']);
        include("nav-top.php") 
    ?>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a data-toggle="tab" href="#Home"><i class="fas fa-home"></i> Home</a>
                        </li>
                        <li><a data-toggle="tab" href="#Interface"><i class="fas fa-hand-holding-usd"></i> Gadai</a>
                        </li>
                        <li class="active"><a data-toggle="tab" href="#transaksi"><i class="fas fa-money-check"></i> Transaksi</a>
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
                        <div id="transaksi" class="tab-pane active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="ongoing-transaksi.php">Transaksi Sedang Berjalan</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">
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
    <!-- Main Menu area End-->
	<!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-support"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Transaksi</h2>
										<p>Transaksi Sedang berjalan</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    <?php
        $validasi_sql = "SELECT * FROM tb_gadai where username = '$_SESSION[uname]' and status_lunas = 0";
        $validasi_query = mysqli_query($conn,$validasi_sql) or die(mysqli_error($conn));
        if (mysqli_num_rows($validasi_query) > 0) {
            include "config/transaksi_process.php";
        }else{
    ?>
        <script>
            swal({
                title: "Belum ada transaksi!",
                text: "Anda Belum Pernah Melalukan Transaksi",
                icon: "info",
                button: "Close",
            });
        </script>
        <div class="container" style="padding-top:5%; padding-bottom:5%">
            <h3>Anda Belum Pernah Melalukan Transaksi</h3>
        </div>
    <?php
        }
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
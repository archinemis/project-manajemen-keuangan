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
    <title>Bayar | Pegadaian Online</title>
    <?php include("get-css.php") ?>
</head>

<body>
    <?php include("nav-top.php") ?>
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
    
    <?php
        $ada_gadai = false;
        $get_detailGadai = "SELECT * 
                            FROM tb_gadai gd
                            JOIN tb_barang b
                            on gd.kode_barang = b.id_barang
                            JOIN tb_barang_detail bd
                            on gd.thn_keluaran = bd.thn_keluaran
                            JOIN tb_detailgadai dg
                            on gd.kode_gadai = dg.kode_gadai
                            where gd.status_lunas = 0 and gd.username = '$_SESSION[uname]' and dg.id_detail_gadai = '$_GET[id_detail]'";
        $query_detailGadai = mysqli_query($conn,$get_detailGadai) or die(mysqli_error($conn));
        if (mysqli_num_rows($query_detailGadai) > 0) {
            $fetct_detail = mysqli_fetch_assoc($query_detailGadai);
            $ada_gadai = true;
        }
    ?>

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
										<h2>Pembayaran Angsuran</h2>
										<p>Pembayaran Angsuran bulan ke <?php echo $fetct_detail['bulan'] ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div class="form-element-area" style="margin-top: 2%">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="row" style="padding-left:20px">
                            <div class="cmp-tb-hd bcs-hd">
                                <h2>Detail Pembayaran Angsuran</h2>
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Jenis barang</th>
                                        <td>
                                            <?php 
                                                if ($fetct_detail['id_barang'] == 1) {
                                                    echo "Laptop";
                                                }elseif($fetct_detail['id_barang'] == 2){
                                                    echo "Televisi";
                                                }else{
                                                    echo "Handphone";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Harga</th>
                                        <td>Rp <?php echo number_format($fetct_detail['harga']) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bunga</th>
                                        <td><?php echo ($fetct_detail['bunga']*100) ?> %</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Lama Angsuran</th>
                                        <td><?php echo $fetct_detail['lama_angsur'] ?> bulan</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Biaya Angsur</th>
                                        <td>Rp <?php echo number_format($fetct_detail['biaya_angsur']) ?> bulan</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pembayaran bulan ke</th>
                                        <td><?php echo $fetct_detail['bulan']?></td>
                                    </tr>
                                </tbody>
                            </table>                                    
                        </div>          
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="row" style="padding-top:20px; padding-bottom:20px; text-align:center">
                            <h3>Transfer ke rekening</h3>                              
                            <h1>1563016616</h1>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
                    <div class="form-element-list">
                        <form action="config/upload_bukti.php" method="POST" enctype="multipart/form-data">
                            <label>Upload Bukti Transfer</label>
                            <br>
                            <br>
                            <div class="input-group date nk-int-st">
                                <input type="hidden" name="kode" value="<?php echo $fetct_detail['kode_gadai'] ?>">
                                <input type="hidden" name="bulan" value="<?php echo $fetct_detail['bulan'] ?>">
                                <input type="file" name="bukti" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <input type="submit" name="submit" class="save-btn" value="Upload">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <div class="container">
        <!-- <button class="save-btn" onclick="myFunction()">Bayar</button> -->
    </div>
    <script>
        function myFunction() {
            swal ({
                title: "Transfer",
                text: "Silahkan transfer biaya angsuran per bulan anda ke rek BCA 1682932 a.n Denandra",
                icon: "info",
                button: "selesai",
            });
        }
    </script>
    
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

<?php
    $cek_kosong = "SELECT * FROM tb_detailuser where id_user = ".$_SESSION['id'];
    $query_cek_kosong = mysqli_query($conn,$cek_kosong);
    $dtKosong = mysqli_fetch_assoc($query_cek_kosong);

    if (empty($dtKosong['nomorKTP']) || empty($dtKosong['jenisKelamin']) || empty($dtKosong['agama']) || empty($dtKosong['tempatLahir']) || empty($dtKosong['tglLahir']) || empty($dtKosong['provinsiTinggal']) || empty($dtKosong['kabKotTinggal']) || empty($dtKosong['kecTinggal']) || empty($dtKosong['kelurahanTinggal']) || empty($dtKosong['statusMenikah']) || empty($dtKosong['namaIbuKandung'])) 
    {
        ?>
            <div class="alert alert-danger" role="alert" style="margin-bottom:0%; border:0px; border-radius:0px">
                Anda belum melengkapi data pribadi! <a href="profile.php" style="color:#ffff99">klik untuk melengkapi</a>
            </div>
            <!-- <script>
                swal({
                    title: "Silahkan isi lengkap profil anda!",
                    text: "Tidak bisa melakukan transaksi jika data belum lengkap",
                    icon: "error",
                    button: "Close",
                });
            </script> -->
        <?php
    }
?>

<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="logo-area">
                    <a href="#"><img src="images/logo.png" alt="" /></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="header-top-menu">
                    <ul class="nav navbar-nav notika-top-nav">
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
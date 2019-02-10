<?php
    include "config/connection.php";
    session_start();
    $get_profile = "SELECT * FROM tb_detailuser du JOIN user u ON du.id_user = u.id_user where du.id_user= ".$_SESSION['id'];
    $query_get_profile = mysqli_query($conn,$get_profile);
    $cek_profile = mysqli_num_rows($query_get_profile);
    $data_profile = mysqli_fetch_assoc($query_get_profile);

    if ($cek_profile) {
        $nomorKTP = $data_profile['nomorKTP'];
        $namaLengkap = $data_profile['namaLengkap'];
        $jenis_kel = $data_profile['jenisKelamin'];
        $agama = $data_profile['agama'];
        $tempatLahir = $data_profile['tempatLahir'];
        $tglLahir = $data_profile['tglLahir'];
        $provinsiTinggal = $data_profile['provinsiTinggal'];
        $kabKotTinggal = $data_profile['kabKotTinggal'];
        $kecTinggal = $data_profile['kecTinggal'];
        $kelurahanTinggal = $data_profile['kelurahanTinggal'];
        $statusMenikah = $data_profile['statusMenikah'];
        $namaIbuKandung = $data_profile['namaIbuKandung'];
        $fotoProfile = $data_profile['fotoProfile'];
        $email = $data_profile['email'];
        $uname = $data_profile['username'];
        $fotoProfile = $data_profile['fotoProfile'];
    }
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Profile | Pegadaian Online</title>
    <meta name="description" content="">
    <?php include("get-css.php") ?>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
</head>

<body>
    <?php 
        //notif berhasil update
        if (!empty($_SESSION['update'])) {
            if ($_SESSION['update'] == "sukses") {
                ?>
                <script>
                    swal("Update Berhasil", "Klik ok untuk menutup", "success")
                </script>
                <?php
            }else if($_SESSION['update'] == "gagaleks"){
                ?>
                <script>
                    swal("Foto gagal di upload", "ekstensi harus jpg, jpeg,png", "error")
                </script>
                <?php
            }else if($_SESSION['update'] == "gagalsize"){
                ?>
                <script>
                    swal("Foto gagal di upload", "Ukuran harus kurang dari 2MB", "error")
                </script>
                <?php
            }else if($_SESSION['update'] == "beda"){
                ?>
                <script>
                    swal("Password harus sama", "password baru dan password yang diulan harus sama", "error")
                </script>
                <?php
            }
            unset($_SESSION['update']);
        }
        include("nav-top.php");

        if (empty($dtKosong['nomorKTP']) || empty($dtKosong['jenisKelamin']) || empty($dtKosong['agama']) || empty($dtKosong['tempatLahir']) || empty($dtKosong['tglLahir']) || empty($dtKosong['provinsiTinggal']) || empty($dtKosong['kabKotTinggal']) || empty($dtKosong['kecTinggal']) || empty($dtKosong['kelurahanTinggal']) || empty($dtKosong['statusMenikah']) || empty($dtKosong['namaIbuKandung'])) 
        {
            ?>
                <script>
                    swal({
                        title: "Silahkan isi lengkap profil anda!",
                        text: "Tidak bisa melakukan transaksi jika data belum lengkap",
                        icon: "error",
                        button: "Close",
                    });
                </script>
            <?php
        }
    ?>
    
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
                        <li><a data-toggle="tab" href="#transaksi"><i class="fas fa-money-check"></i> Transaksi</a>
                        </li>
                        <li class="active"><a data-toggle="tab" href="#profile"><i class="far fa-user"></i> Profile</a>
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
                        <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="gadai-elektronik.php">Elektronik</a>
                                </li>
                            </ul>
                        </div>
                        <div id="profile" class="tab-pane active notika-tab-menu-bg animated flipInX">
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

    <form action="config/process-update.php" method="post" enctype="multipart/form-data">
        <div class="form-element-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" style="padding-top:4%">
                        <center>
                            <div class="hd-message-img">
                                <?php
                                    if (!empty($fotoProfile)) {
                                        echo '<img src="images/profile/'.$fotoProfile.'" alt="'.$fotoProfile.'" />';
                                    }else{
                                        echo '<img src="images/blank.png" alt="" />';
                                    }
                                ?>
                            </div>
                        </center>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-element-list mg-t-30">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="nk-int-st">
                                            <label>username*</label>
                                            <div class="input-group date nk-int-st">
                                                <?php
                                                    if (!empty($uname)) {
                                                        echo '<input type="text" name="username" class="form-control" value="'.$uname.'" required>';
                                                    }else{
                                                        echo '<input type="text" name="username" class="form-control" value="" required>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="nk-int-st">
                                            <label>Email*</label>
                                            <div class="input-group date nk-int-st">
                                                <?php
                                                    if (!empty($email)) {
                                                        echo '<input type="text" name="email" class="form-control" value="'.$email.'" required>';
                                                    }else{
                                                        echo '<input type="text" name="email" class="form-control" value="" required>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%; margin-bottom:1%">
                                    <label style="color:#737373;">Ubah Password</label>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="nk-int-st">
                                            <label>Password Baru</label>
                                            <div class="input-group date nk-int-st">
                                                <?php
                                                    if (!empty($kecTinggal)) {
                                                        echo '<input type="password" name="passw" class="form-control" value="'.$kecTinggal.'">';
                                                    }else{
                                                        echo '<input type="password" name="passw" class="form-control" value="">';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="nk-int-st">
                                            <label>Ketik ulang password</label>
                                            <div class="input-group date nk-int-st">
                                                <?php
                                                    if (!empty($kecTinggal)) {
                                                        echo '<input type="password" name="ulangpas" class="form-control" value="'.$kecTinggal.'">';
                                                    }else{
                                                        echo '<input type="password" name="ulangpas" class="form-control" value="">';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="nk-int-st">
                                            <label>Ubah Foto Profile*</label>
                                            <div class="input-group date nk-int-st">
                                                <?php
                                                    if (!empty($fotoProfile)) {
                                                        echo '<input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">';
                                                        echo '<input type="hidden" value="'.$fotoProfile.'" name="hidden_name">';
                                                    }else{
                                                        echo '<input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-element-list mg-t-30">
                            <!-- <div class="cmp-tb-hd">
                                <h2>Floating Labels</h2>
                                <p>Basic example for input groups with floating labels </p>
                            </div> -->
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="nk-int-st">
                                            <label>Nomor KTP*</label>
                                            <div class="input-group date nk-int-st">
                                                <?php
                                                    if (!empty($nomorKTP)) {
                                                        echo '<input type="text" name="nomorKTP" class="form-control" value="'.$nomorKTP.'" required>';
                                                    }else{
                                                        echo '<input type="text" name="nomorKTP" class="form-control"  value="" required>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="nk-int-st">
                                            <label>Jenis Kelamin*</label>
                                            <div class="input-group date nk-int-st">
                                                <?php
                                                    if (!empty($jenis_kel)) {
                                                        ?>
                                                        <div class="bootstrap-select fm-cmp-mg">
                                                            <select class="selectpicker" name="jenisKelamin" required>
                                                                <?php
                                                                    if ($jenis_kel == "L") {
                                                                        echo '<option value="L" selected>Laki - Laki</option>';
                                                                        echo '<option value="P">Perempuan</option>';
                                                                    }else{
                                                                        echo '<option value="L">Laki - Laki</option>';
                                                                        echo '<option value="P" selected>Perempuan</option>';
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <div class="bootstrap-select fm-cmp-mg">
                                                            <select class="selectpicker" name="jenisKelamin" required>
                                                                <option selected disabled="true">Pilih Jenis Kelamin</option>
                                                                <option value="L">Laki - Laki</option>
                                                                <option value="P">Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="nk-int-st">
                                            <label>Tempat Lahir*</label>
                                            <div class="input-group date nk-int-st">
                                                <?php
                                                    if (!empty($tempatLahir)) {
                                                        echo '<input type="text" name="tempatLahir" class="form-control" value="'.$tempatLahir.'" required>';
                                                    }else{
                                                        echo '<input type="text" name="tempatLahir" class="form-control" value="" required>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="nk-int-st">
                                            <label>Nama Lengkap*</label>
                                            <div class="input-group date nk-int-st">
                                                <?php
                                                    if (!empty($namaLengkap)) {
                                                        echo '<input type="text" name="namaLengkap" class="form-control" value="'.$namaLengkap.'" required>';
                                                    }else{
                                                        echo '<input type="text" name="namaLengkap" class="form-control" value="" required>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="nk-int-st">
                                            <label>Agama*</label>
                                            <div class="input-group date nk-int-st">
                                                <?php
                                                    if (!empty($agama)) {
                                                        echo '<input type="text" name="agama" class="form-control" value="'.$agama.'" required>';
                                                    }else{
                                                        echo '<input type="text" name="agama" class="form-control" value="" required>';
                                                    }
                                                    
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="nk-int-st">
                                            <label>Tanggal Lahir*</label>
                                            <div class="input-group date nk-int-st">
                                                <?php
                                                    if (!empty($tglLahir)) {
                                                        echo '<input type="text" name="tglLahir" class="form-control" value="'.$tglLahir.'" required>';
                                                    }else{
                                                        echo '<input type="text" name="tglLahir" class="form-control" value="" required>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-element-list mg-t-30">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="nk-int-st">
                                            <label>Provinsi*</label>
                                            <div class="input-group date nk-int-st">
                                                <?php
                                                    if (!empty($provinsiTinggal)) {
                                                        echo '<input type="text" name="provinsiTinggal" class="form-control" value="'.$provinsiTinggal.'" required>';
                                                    }else{
                                                        echo '<input type="text" name="provinsiTinggal" class="form-control" value="" required>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="nk-int-st">
                                            <label>Kecamatan*</label>
                                            <div class="input-group date nk-int-st">
                                                <?php
                                                    if (!empty($kecTinggal)) {
                                                        echo '<input type="text" name="kecTinggal" class="form-control" value="'.$kecTinggal.'" required>';
                                                    }else{
                                                        echo '<input type="text" name="kecTinggal" class="form-control" value="" required>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="nk-int-st">
                                            <label>Status Menikah*</label>
                                            <div class="input-group date nk-int-st">
                                                <?php
                                                    if (!empty($statusMenikah)) {
                                                        echo '<input type="text" name="statusMenikah" class="form-control" value="'.$statusMenikah.'" required>';
                                                    }else{
                                                        echo '<input type="text" name="statusMenikah" class="form-control" value="" required>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="nk-int-st">
                                            <label>Kabupaten / Kota*</label>
                                            <div class="input-group date nk-int-st">
                                                <?php
                                                    if (!empty($kabKotTinggal)) {
                                                        echo '<input type="text" name="kabKotTinggal" class="form-control" value="'.$kabKotTinggal.'" required>';
                                                    }else{
                                                        echo '<input type="text" name="kabKotTinggal" class="form-control" value="" required>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="nk-int-st">
                                            <label>Kelurahan*</label>
                                            <div class="input-group date nk-int-st">
                                                <?php
                                                    if (!empty($kelurahanTinggal)) {
                                                        echo '<input type="text" name="kelurahanTinggal" class="form-control" value="'.$kelurahanTinggal.'" required>';
                                                    }else{
                                                        echo '<input type="text" name="kelurahanTinggal" class="form-control" value="" required>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="nk-int-st">
                                            <label>Nama Ibu Kandung*</label>
                                            <div class="input-group date nk-int-st">
                                                <?php
                                                    if (!empty($namaIbuKandung)) {
                                                        echo '<input type="text" name="namaIbuKandung" class="form-control" value="'.$namaIbuKandung.'" required>';
                                                    }else{
                                                        echo '<input type="text" name="namaIbuKandung" class="form-control" value="" required>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>

        <div class="container">
            <input type="submit" name="submit" class="save-btn" value="Save">
        </div>
    </form>

    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018 Kelompok Nyambek</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include("get-js.php") ?>
</body>

</html>
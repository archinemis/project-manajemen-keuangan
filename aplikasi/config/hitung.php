<?php
    if(!empty($_GET['merk'])){
        include "config/connection.php";
        $sql = "SELECT * from tb_barang_detail 
                where 
                id_barang = '$_GET[pilih_jenis]' and 
                thn_keluaran = '$_GET[tahun]'";
        $query = mysqli_query($conn,$sql);

        $row = mysqli_fetch_assoc($query);

        if($_GET['pilih_jenis'] == 1){
            $bunga = 0.08;
            $harga_diskon = $row['harga']+($row['harga']*$bunga);
        }else if($_GET['pilih_jenis'] == 2){
            $bunga = 0.06;
            $harga_diskon = $row['harga']+($row['harga']*$bunga);
        }else if($_GET['pilih_jenis'] == 3){
            $bunga = 0.05;
            $harga_diskon = $row['harga']+($row['harga']*$bunga);
        }

        $angsuran = $row['harga']*(1+$bunga);

        $biaya_angsur = $angsuran-$row['harga'];

        $angsuran_bulan = $biaya_angsur/12;

        $biaya_pokok = $row['harga']/12;

        // $angsuran_bulan = $biaya_angsur/$_GET['lama_angsur'];

        $biaya_pokok = $row['harga']/$_GET['lama_angsur'];

        $yang_dibayar = $angsuran_bulan+$biaya_pokok;
?>

<div class="form-element-area" style="margin-top: 2%">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="form-element-list">
                    <div class="row" style="padding-left:20px">
                        <div class="cmp-tb-hd bcs-hd">
                            <h2>Detail Barang</h2>
                        </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Jenis barang</th>
                                    <td>
                                        <?php 
                                            if ($_GET['pilih_jenis'] == 1) {
                                                echo "Laptop";
                                            }elseif($_GET['pilih_jenis'] == 2){
                                                echo "Televisi";
                                            }else{
                                                echo "Handphone";
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Merk</th>
                                    <td><?php echo $_GET['merk'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Tipe</th>
                                    <td><?php echo $_GET['tipe'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Kondisi</th>
                                    <td><?php echo $_GET['kondisi'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Tahun Keluaran</th>
                                    <td><?php echo $_GET['tahun'] ?></td>
                                </tr>
                            </tbody>
                        </table>                                    
                    </div>          
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="form-element-list">
                    <div class="row" style="padding-left:20px">
                        <div class="cmp-tb-hd bcs-hd">
                            <h2>Detail Biaya Gadai</h2>
                        </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Harga</th>
                                    <td>Rp <?php echo number_format($row['harga']) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Bunga</th>
                                    <td><?php echo ($bunga*100) ?> %</td>
                                </tr>
                                <tr>
                                    <th scope="row">Lama Angsuran</th>
                                    <td><?php echo $_GET['lama_angsur'] ?> bulan</td>
                                </tr>
                                <!-- <tr>
                                    <th scope="row">Harga Setelah bunga</th>
                                    <td>Rp <?php //echo number_format($angsuran) ?> bulan</td>
                                </tr> -->
                                <tr>
                                    <th scope="row">Biaya Angsur per bulan</th>
                                    <td>Rp <?php echo number_format($yang_dibayar) ?> bulan</td>
                                </tr>
                            </tbody>
                        </table>                              
                    </div>          
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <form action="" method="post">
        <input type="submit" name="gadai" class="gadai-btn" value="Gadai">
    </form>
    <?php
        $tanggal_sekarang = date("Y-m-d h:i:sa");
        if (isset($_POST['gadai'])) {
            if (empty($dtKosong['nomorKTP']) || empty($dtKosong['jenisKelamin']) || empty($dtKosong['agama']) || empty($dtKosong['tempatLahir']) || empty($dtKosong['tglLahir']) || empty($dtKosong['provinsiTinggal']) || empty($dtKosong['kabKotTinggal']) || empty($dtKosong['kecTinggal']) || empty($dtKosong['kelurahanTinggal']) || empty($dtKosong['statusMenikah']) || empty($dtKosong['namaIbuKandung'])) 
            {
                ?>
                    <script>
                        swal("Gagal melakukan gadai!", "Anda belum mengisi biodata secara lengkap", "error");
                    </script>
                <?php
            }else{
                $validasi_sql = "SELECT * FROM tb_gadai where username = '$_SESSION[uname]' and status_lunas = 0";
                $validasi_query = mysqli_query($conn,$validasi_sql) or die(mysqli_error($conn));

                if (mysqli_num_rows($validasi_query) > 0) {
                    ?>
                        <script>
                            swal("Gagal melakukan gadai!", "tidak bisa gadai jika ada proses angsur yang berjalan", "error");
                        </script>
                    <?php
                }else{
                    $kode_gadai = substr($_SESSION['uname'],-3)."".time();

                    $inseeeet = "INSERT INTO tb_gadai(
                        id,
                        kode_gadai,
                        kode_barang,
                        merk,
                        tipe,
                        kondisi,
                        thn_keluaran,
                        bunga,
                        lama_angsur,
                        biaya_angsur,
                        username,
                        tanggal_gadai,
                        status_lunas
                    ) VALUES(
                        NULL,
                        '$kode_gadai',
                        '$_GET[pilih_jenis]',
                        '$_GET[merk]',
                        '$_GET[tipe]',
                        '$_GET[kondisi]',
                        '$_GET[tahun]',
                        '$bunga',
                        '$_GET[lama_angsur]',
                        '$yang_dibayar',
                        '$_SESSION[uname]',
                        '$tanggal_sekarang',
                        '0'
                    )";

                    if (mysqli_query($conn,$inseeeet)) {
                        for ($i=1; $i <= $_GET['lama_angsur'] ; $i++) {
                            $queryyyy = mysqli_query($conn,"INSERT INTO tb_detailgadai VALUES(NULL,'$kode_gadai',0,0,'$i',NULL)") or die(mysqli_error($conn));
                        }
                    ?>
                        <script>
                            swal("Gadai berhasil", "Silahkan tunggu konfirmasi", "success")
                        </script>
                        <script>
                            swal({
                                title: "Gadai berhasil!",
                                text: "Silahkan ke menu transaksi untuk detail!",
                                icon: "success",
                                buttons: {
                                    catch: {
                                        text: "Oke",
                                        value: "catch",
                                    }
                                },
                                })
                                .then((value) => {
                                switch (value) {
                                    case "catch":
                                    window.location = "gadai-elektronik.php";
                                    break;
                                }
                            });
                        </script>
                        
                    <?php
                        // header("location:gadai-elektronik.php");
                    }else{
                        echo "Error : " . $inseeeet . "<br>" . mysqli_error($conn);
                    }
                }
            }

        }
    ?>
</div>

<?php
    }
?>
            
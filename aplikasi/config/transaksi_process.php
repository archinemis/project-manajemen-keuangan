<?php
    $ada_gadai = false;
    $get_detailGadai = "SELECT * 
                        FROM tb_gadai gd
                        JOIN tb_barang b
                        on gd.kode_barang = b.id_barang
                        JOIN tb_barang_detail bd
                        on gd.thn_keluaran = bd.thn_keluaran
                        where gd.status_lunas = 0 and gd.username = '$_SESSION[uname]'";
    $query_detailGadai = mysqli_query($conn,$get_detailGadai) or die(mysqli_error($conn));
    if (mysqli_num_rows($query_detailGadai) > 0) {
        $fetct_detail = mysqli_fetch_assoc($query_detailGadai);
        $ada_gadai = true;
    }
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
                                    <th scope="row">Merk</th>
                                    <td><?php echo $fetct_detail['merk'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Tipe</th>
                                    <td><?php echo $fetct_detail['tipe'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Kondisi</th>
                                    <td><?php echo $fetct_detail['kondisi'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Tahun Keluaran</th>
                                    <td><?php echo $fetct_detail['thn_keluaran'] ?></td>
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
                            </tbody>
                        </table>                              
                    </div>          
                </div>
            </div>
        </div>
    </div>
</div>

<div class="invoice-area" style="margin-top:2%">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="invoice-wrap">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="invoice-sp">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Bulan</th>
                                            <th>Biaya Angsur /bulan</th>
                                            <th>Status dibayar</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if ($ada_gadai = true) {
                                                $get_angsur = "SELECT * 
                                                                FROM tb_detailGadai dg
                                                                JOIN tb_gadai g
                                                                on dg.kode_gadai = g.kode_gadai
                                                                where g.username = '$_SESSION[uname]'";

                                                $query_angsur = mysqli_query($conn,$get_angsur) or die(mysqli_error($conn));

                                                if (mysqli_num_rows($query_angsur) > 0) {
                                                    $no = 1;
                                                    while($fetch_angsur = mysqli_fetch_assoc($query_angsur)){
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no ?></td>
                                                            <td>Bulan <?php echo $fetch_angsur['bulan'] ?></td>
                                                            <td>Rp <?php echo number_format($fetch_angsur['biaya_angsur']) ?></td>
                                                            <td>
                                                                <?php
                                                                    if ($fetch_angsur['status_dibayar'] == 0) {
                                                                        echo '<button class="btn btn-danger notika-btn-danger waves-effect">Belum Bayar</button>';
                                                                    }else{
                                                                        echo '<button class="btn btn-success notika-btn-success waves-effect">Sudah Bayar</button>';
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                    if ($fetch_angsur['status_konfirmasi'] == 0) {
                                                                        echo '<a href="bayar.php?id_detail='.$fetch_angsur['id_detail_gadai'].'"><button class="btn btn-info notika-btn-info waves-effect">Bayar</button></a>';
                                                                    }elseif($fetch_angsur['status_konfirmasi'] == 1){
                                                                        echo '<button class="btn btn-info notika-btn-info waves-effect">Menunggu Konfirmasi</button>';
                                                                    }else{
                                                                        echo "";
                                                                    }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        $no++;
                                                    }
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
<form action="gadai-elektronik.php" method="GET">
    <div class="form-element-area">
        <div class="container">
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="cmp-tb-hd bcs-hd">
                            <h2>Gadai Barang Elektronik</h2>
                            <p>Kredit Cepat Amat (KCA) adalah kredit dengan sistem gadai yang diberikan kepada semua golongan nasabah, baik untuk kebutuhan konsumtif maupun kebutuhan produktif. KCA merupakan solusi terpercaya untuk mendapatkan pinjaman secara mudah cepat dan aman.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-3 col-sm-3 col-xs-12">
                                <div class="nk-int-mk">
                                    <label>Jenis</label>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" name="pilih_jenis" required>
                                        <option disabled="true" selected value="">Pilih Jenis</option>
                                        <?php
                                            $select_merk = "SELECT * FROM tb_barang";
                                            $query_merk = mysqli_query($conn,$select_merk);
                                            while($data_merk = mysqli_fetch_assoc($query_merk)){
                                        ?>
                                                <option value="<?php echo $data_merk['id_barang'] ?>"><?php echo $data_merk['nama_barang'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="nk-int-st">
                                        <label>Merk</label>
                                        <div class="input-group date nk-int-st">
                                            <input type="text" class="form-control" name="merk" placeholder="Masukkan merk" required
                                            value="<?php 
                                                        if(!empty($_GET['merk'])) {
                                                            echo $_GET['merk'];
                                                        }
                                                    ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="nk-int-st">
                                        <label>Lama Angsuran</label>
                                        <div class="input-group date nk-int-st">
                                            <select name="lama_angsur" class="selectpicker" required>
                                                <option value="" selected>Pilih lama angsuran</option>
                                                <?php
                                                    for ($i=1; $i < 13; $i++) { 
                                                        echo "<option value='".$i."'>".$i." bulan</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                <div class="nk-int-mk">
                                    <label>Kondisi</label>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" name="kondisi" required>
                                        <option disabled="true" selected value="">Pilih Kondisi</option>
                                        <option value="baru">Baru (Kurang dari 2 bulan)</option>
                                        <option value="lama">Lama (Lebih dari 2 bulan)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="nk-int-st">
                                        <label>Tipe</label>
                                        <div class="input-group date nk-int-st">
                                            <input type="text" class="form-control" name="tipe" placeholder="Masukkan Tipe" required
                                            value="<?php 
                                                if(!empty($_GET['tipe'])) {
                                                    echo $_GET['tipe'];
                                                }
                                                    ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px">
                            <div class="col-lg-6 col-md-3 col-sm-3 col-xs-12">
                                <div class="nk-int-mk">
                                    <label>Tahun Keluaran</label>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" name="tahun" required>
                                        <option disabled="true" selected value="">Pilih Tahun</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="nk-int-st">
                                        <label>Deskripsi</label>
                                        <div class="input-group date nk-int-st">
                                            <textarea class="form-control" rows="5" cols="40" placeholder="Masukkan deskripsi barang" name="deskripsi"><?php  if(!empty($_GET['deskripsi'])) { echo $_GET['deskripsi']; } ?></textarea>
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
    <input type="submit" name="submit" class="save-btn" value="Hitung Biaya Gadai">
    </div>
</form>
<?php
    include "config/hitung.php";
?>
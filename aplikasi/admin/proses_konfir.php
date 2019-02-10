<?php
    include "../config/connection.php";
    if (isset($_POST['konfir'])) {
        $update = "UPDATE tb_detailgadai SET status_konfirmasi = 2, status_dibayar = 1 where kode_gadai = '$_POST[kode]' and bulan = '$_POST[bulan]'";
        $query = mysqli_query($conn,$update) or die(mysqli_error($conn));

        if ($query) {
            $_SESSION['sukses'] = "sukses";
            header("location:index.php");
        }
    }
?>
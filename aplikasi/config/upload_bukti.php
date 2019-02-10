<?php
    session_start();
    include "connection.php";

    if (isset($_POST['submit'])) {
        $kode = $_POST['kode'];
        $bulan = $_POST['bulan'];

        $errors= array();
        $file_size =$_FILES['bukti']['size'];
        $file_tmp =$_FILES['bukti']['tmp_name'];
        $file_type=$_FILES['bukti']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['bukti']['name'])));
        $file_name = "";
        
        $expensions= array("jpeg","jpg","png","pdf");
        
        if(in_array($file_ext,$expensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152){
            $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($errors)==true){
            $file_name = $kode.''.$bulan.''.$_SESSION['uname'].'.'.$file_ext;
            move_uploaded_file($file_tmp,"../images/bukti/".$file_name);
        }else{
            print_r($errors);
        }

        $update_bukti = "UPDATE tb_detailgadai SET bukti = '$file_name', status_konfirmasi = 1 where kode_gadai = '$kode' and bulan = '$bulan'";
        $query_bakti = mysqli_query($conn,$update_bukti) or die (mysqli_error($conn));

        if ($query_bakti) {
            echo "sukses";
            $_SESSION['upload'] = "sukses";
            header("location:../ongoing-transaksi.php");
        }else{
            echo "error ".mysqli_error($conn);
        }
    }
?>
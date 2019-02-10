<?php
    session_start();
    include("connection.php");
    if (isset($_POST['submit'])) {

        if ($_POST['passw'] == $_POST['ulangpas']) {
            if (!empty($_POST['hidden_name']) AND empty($_FILES['foto']['size'])) {
                $file_name = $_POST['hidden_name'];
            }else{
                //insert foto profile
                $errors= array();
                $file_size =$_FILES['foto']['size'];
                $file_tmp =$_FILES['foto']['tmp_name'];
                $file_type=$_FILES['foto']['type'];
                $file_ext=strtolower(end(explode('.',$_FILES['foto']['name'])));
                $file_name = "";
                
                $expensions= array("jpeg","jpg","png");
                
                if(in_array($file_ext,$expensions)=== false){
                    // $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                    $_SESSION['update'] = "gagaleks";
                    header("location:../profile.php");
                }
                
                if($file_size > 2097152){
                    // $errors[]='File size must be excately 2 MB';
                    $_SESSION['update'] = "gagalsize";
                    header("location:../profile.php");
                }
                
                if(empty($errors)==true){
                    $file_name = $_SESSION['uname'].'.'.$file_ext;
                    move_uploaded_file($file_tmp,"../images/profile/".$file_name);
                }else{
                    print_r($errors);
                }
            }
    
            //proses update
            $nomorKTP_get = $_POST['nomorKTP'];
            $namaLengkap_get = $_POST['namaLengkap'];
            $jenis_kel_get = $_POST['jenisKelamin'];
            $agama_get = $_POST['agama'];
            $tempatLahir_get = $_POST['tempatLahir'];
            $tglLahir_get = $_POST['tglLahir'];
            $provinsiTinggal_get = $_POST['provinsiTinggal'];
            $kabKotTinggal_get = $_POST['kabKotTinggal'];
            $kecTinggal_get = $_POST['kecTinggal'];
            $kelurahanTinggal_get = $_POST['kelurahanTinggal'];
            $statusMenikah_get = $_POST['statusMenikah'];
            $namaIbuKandung_get = $_POST['namaIbuKandung'];
            $email_get = $_POST['email'];
            $uname_get = $_POST['username'];
            $password_get = $_POST['passw'];
    
            $update_profile = "UPDATE tb_detailuser SET
                                nomorKTP = '$nomorKTP_get',
                                namaLengkap = '$namaLengkap_get',
                                jenisKelamin = '$jenis_kel_get',
                                agama = '$agama_get',
                                tempatLahir = '$tempatLahir_get',
                                tglLahir = '$tglLahir_get',
                                provinsiTinggal = '$provinsiTinggal_get',
                                kabKotTinggal = '$kabKotTinggal_get',
                                kecTinggal = '$kecTinggal_get',
                                kelurahanTinggal = '$kelurahanTinggal_get',
                                statusMenikah = '$statusMenikah_get',
                                namaIbuKandung = '$namaIbuKandung_get',
                                fotoProfile = '$file_name',
                                email = '$email_get'
                                where id_user = ".$_SESSION['id'];
    
            $query_update = mysqli_query($conn,$update_profile);

            $update_pass = "UPDATE user SET
                            password = '$password_get'
                            where id_user = ".$_SESSION['id'];
            
            $query_pass = mysqli_query($conn,$update_pass);
            
            if ($query_update) {
                $_SESSION['update'] = "sukses";
                header("location:../profile.php");
            }
        }else{
            $_SESSION['update'] = "beda";
            header("location:../profile.php");
        }

    }
?>
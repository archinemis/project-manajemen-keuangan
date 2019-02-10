<?php
  session_start();
  if (!empty($_SESSION['uname'])) {
    header("location:index.php");
  }
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register | Pegadaian Online</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">

    <script src="js/sweetalert.min.js"></script>
</head>

<body>
    <div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
            <div class="nk-form">
            <h2 style="margin-bottom: 10%">DAFTAR USER</h2>
                <form action="register.php" method="post">
                  <div class="input-group">
                      <span class="input-group-addon nk-ic-st-pro"><i class="far fa-user"></i></span>
                      <div class="nk-int-st">
                          <input type="text" class="form-control" placeholder="Nama" name="nama" required>
                      </div>
                  </div>
                  <div class="input-group mg-t-15">
                      <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                      <div class="nk-int-st">
                          <input type="text" class="form-control" placeholder="Username" name="username" required>
                      </div>
                  </div>
                  <div class="input-group mg-t-15">
                      <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                      <div class="nk-int-st">
                          <input type="password" class="form-control" placeholder="Password" name="password" required>
                      </div>
                  </div>
                  <div class="input-group mg-t-15">
                      <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                      <div class="nk-int-st">
                          <input type="password" class="form-control" placeholder="Masukkan ulang Password" name="password-ulang" required>
                      </div>
                  </div>
                  <input type="submit" name="regis" class="btn btn-primary" style="border-radius:0px; margin-top:30px; width:250px; height:40px; background:#00C292; border:0px" value="Register">
                  <section style="margin-top:12px">
                    Kembali ke login <a href="login.php">klik disini</a>
                  </section>
                </form>

                <?php
                    include "config/connection.php";
                    if (isset($_POST['regis'])) {
                        $cek_username = "SELECT * FROM user where username = '$_POST[username]'";
                        $query_cek_username = mysqli_query($conn,$cek_username);
                        $cek = false;
                        
                        if (mysqli_num_rows($query_cek_username) > 0) {
                          $cek = true;
                        }
                        
                        if ($_POST['password'] == $_POST['password-ulang'] || $cek = false) {

                          $get_nama = $_POST['nama'];
                          $get_username = $_POST['username'];
                          $get_password = $_POST['password'];
                          $role = "member";

                          $insert_user = "INSERT INTO user values(null,'$get_username','$get_password','$role')";
                          $query_insert = mysqli_query($conn,$insert_user) or die(mysqli_error($conn));

                          $id_users = $conn->insert_id;

                          $insert_detail = "INSERT INTO tb_detailuser(id_user,namaLengkap) values('$id_users','$get_nama')";
                          $query_insert_detail = mysqli_query($conn,$insert_detail) or die(mysqli_error($conn));

                          if ($query_insert && $query_insert_detail) {
                              ?>
                              <script>
                                swal("Registrasi Berhasil", "Klik ok untuk ke halam login", "success")
                                .then((value) => {
                                  window.location = "login.php";
                                })
                              </script>
                              <?php
                          }
                        }else{
                          ?>
                            <script>
                              swal({
                                  title: "error",
                                  text: "password tidak sama",
                                  icon: "error",
                                  button: "Close",
                                  });
                            </script>
                          <?php
                        }
                    }
                ?>
            </div>
        </div>

    </div>
    
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- Login JS
		============================================ -->
    <script src="js/login/login-action.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>
</html>
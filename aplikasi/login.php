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
    <title>Login | Pegadaian Online</title>
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
    <link rel="stylesheet" href="css/font-awesome.min.css">
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
            <h2 style="margin-bottom: 10%">Masuk Sekarang</h2>
                <form action="login.php" method="post">
                  <div class="input-group">
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
                  <input type="submit" class="btn btn-primary" style="border-radius:0px; margin-top:30px; width:250px; height:40px; background:#00C292; border:0px" value="Login">
                  <section style="margin-top:10px">
                    Belum memiliki akun? <a href="register.php">Register</a>
                  </section>
                </form>

                <?php
                  include "config/connection.php";
                  if(!empty($_POST['username']) && !empty($_POST['password'])){
                    $get_login = "SELECT * FROM user WHERE username = '$_POST[username]' AND password = '$_POST[password]'";
                    $query_login = mysqli_query($conn,$get_login);
                    if(mysqli_num_rows($query_login) > 0){
                      $data_login = mysqli_fetch_assoc($query_login);
                      $_SESSION['uname'] = $_POST['username'];
                      $_SESSION['pass'] = $_POST['password'];
                      $_SESSION['id'] = $data_login['id_user'];
                      if ($data_login['username'] == "admin" && $data_login['password'] == "admin") {
                        header("location:admin/index.php");
                      }else{
                        header("location:index.php");
                      }
                    }else{
                ?>
                    <script>
                        swal({
                            title: "error",
                            text: "Login Gagal",
                            icon: "error",
                            button: "Close",
                            });
                    </script>
                <?php
                    }
                  }else{
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
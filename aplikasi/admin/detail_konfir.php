<?php
  session_start();
  include "../config/connection.php";

  $get_data = "SELECT * FROM tb_detailgadai where kode_gadai = '$_GET[kode]' and bulan = '$_GET[bulan]'";
  $query_data = mysqli_query($conn,$get_data);
  $fetch = mysqli_fetch_assoc($query_data);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daftar booking | Admin</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Admin</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Butuh konfirmasi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tables.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Semua Gadai</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>
      </ul>


      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="tables.php">Daftar</a>
            </li>
            <li class="breadcrumb-item active">Detail <?php echo $_GET['kode'] ?></li>
          </ol>

          <div class="row">
            <div class="col-lg-7">
              <div class="card mb-3">
                <div class="card-header">
                  <!-- <i class="fas fa-chart-bar"></i> -->
                  Konfirmasi pembayaran kode <?php echo $_GET['kode'] ?>
                </div>
                <div class="card-body">
                    <div class="form-element-list">
                        <div class="row" style="padding-left:20px">
                            <div class="cmp-tb-hd bcs-hd">
                                <h2>Detail Biaya Gadai</h2>
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Kode Gadai</th>
                                        <td><?php echo $_GET['kode'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bulan ke</th>
                                        <td><?php echo $fetch['bulan'] ?></td>
                                    </tr>
                                    <form action="proses_konfir.php" method="post">
                                    <tr>
                                        <input type="hidden" name="bulan" value="<?php echo $_GET['bulan'] ?>">
                                        <input type="hidden" name="kode" value="<?php echo $_GET['kode'] ?>">
                                        <th scope="row">Konfirmasi</th>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Konfirmasi Pembayaran
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"></th>
                                        <td>
                                            <input name="konfir" type="submit" class="btn btn-info" value="Konfirmasi">    
                                        </td>
                                    </tr>
                                    </form>
                                </tbody>
                            </table>                              
                        </div>          
                    </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="card mb-3">
                <div class="card-header">
                  <!-- <i class="fas fa-chart-pie"></i> -->
                  Foto konfirmasi</div>
                <div class="card-body">
                  <img src="../images/bukti/<?php echo $fetch['bukti'] ?>" alt="" style="width:100%">
                </div>
                <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
              </div>
            </div>
          </div>

        </div>

        
        
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <?php include("modal.php") ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

  </body>

</html>

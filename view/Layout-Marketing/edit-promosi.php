<?php
include '../../config.php';
$datax = [];
$query = mysqli_query($conn, "SELECT * FROM promosi WHERE kd_promosi ='$_GET[id]'");
$i = 0;
while ($dt = mysqli_fetch_array($query)) {
    $datax[$i][0] = $dt['periklanan'];
    $datax[$i][1] = $dt['penjualanpersonal'];
    $datax[$i][2] = $dt['promosipenjualan'];
    $datax[$i][3] = $dt['publisitas'];
    $datax[$i][4] = $dt['pemasaranlangsung'];
    $datax[$i][5] = $dt['id_produk'];

    $i++;
}
$datas = [1, 2, 3, 4, 5];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Input Data Promosi</title>

    <!-- Custom fonts for this template-->
    <!-- <link
      href="../../vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    /> -->

    <!-- Custom fonts for this template -->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet" />
</head>

<body id="page-top">

    <?php

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['jenis_user'] !== "marketing") {
        header("location:../../login.php?pesan=gagal");
    }

    ?>

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../Dashboard/dashboard-marketing.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['nama'] ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../Dashboard/dashboard-marketing.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="form-produk.php">
                    <i class="fa-solid fa-basket-shopping"></i>
                    <span>Produk</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="form-promosi.php">
                    <i class="fa-solid fa-tags"></i>
                    <span>Promosi</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="form-pelanggan.php">
                    <i class="fa-solid fa-user"></i>
                    <span>Pelanggan</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->

            <!-- Heading -->

            <!-- Divider -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                        <!-- Nav Item - Alerts -->

                        <!-- Nav Item - Messages -->

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama'] ?> </span>
                                <img class="img-profile rounded-circle" src="../../img/undraw_profile.svg" />
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div>
                        <h1 class="h3 mb-2 text-gray-800">Edit Data Promosi</h1>
                        <form method="post" action="../../action/edit-promosi.php">
                            <select style="width: 30%;" required name="id_produk" class="custom-select my-1 mr-sm-2">
                                <option>Pilih Produk....</option>
                                <?php
                                $no = 0;
                                $data = mysqli_query($conn, "select * from produk");
                                while ($d = mysqli_fetch_array($data)) {
                                    $no++;
                                    if ($datax[0][5] == $d['id_produk']) {
                                        echo "<option selected value='$d[id_produk]'>$d[nama_produk]</option>";
                                    } else {
                                        echo "<option value='$d[id_produk]'>$d[nama_produk]</option>";
                                    }
                                ?>
                                    <!-- <option selected>Choose...</option> -->
                                <?php
                                } ?>
                            </select>

                            <hr>
                    </div>
                    <div>

                        <table class="table table-bordered">
                            <tr>
                                <th>
                                    <center>#</center>
                                </th>
                                <th>
                                    Periklanan
                                </th>
                                <th>
                                    Penjualan
                                </th>
                                <th>
                                    Promosi Penjualan
                                </th>
                                <th>
                                    Punlisitas
                                </th>
                                <th>
                                    Pemasaran Langsung
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <b>A1</b>
                                </td>
                                <td>
                                    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                                    <select name="periklanan1" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {

                                            if ($datax[0][0] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pen_per1" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[0][1] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pro_pen1" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[0][2] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="publisitas1" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[0][3] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pem_lan1" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[0][4] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>A2</b>
                                </td>
                                <td>
                                    <select name="periklanan2" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[1][0] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pen_per2" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[1][1] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pro_pen2" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[1][2] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="publisitas2" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[1][3] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pem_lan2" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[1][4] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>A3</b>
                                </td>
                                <td>
                                    <select name="periklanan3" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[1][0] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pen_per3" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[2][1] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pro_pen3" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[2][2] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="publisitas3" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[2][3] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pem_lan3" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[2][4] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>A4</b>
                                </td>
                                <td>
                                    <select name="periklanan4" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[2][0] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pen_per4" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[3][1] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pro_pen4" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[3][2] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="publisitas4" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[3][3] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pem_lan4" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[3][4] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>A5</b>
                                </td>
                                <td>
                                    <select name="periklanan5" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[4][0] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pen_per5" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[4][1] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pro_pen5" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[4][2] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="publisitas5" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[4][3] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pem_lan5" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[4][4] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <!-- <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Periklanan</label>
                                <div class="col-sm-5">
                                    <select name="periklanan" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[0][0] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Penjulan Personal</label>
                                <div class="col-sm-5">
                                    <select name="pen_per" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[0][0] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Promosi Penjualan</label>
                                <div class="col-sm-5">
                                    <select name="pro_pen" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[0][0] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Publisitas</label>
                                <div class="col-sm-5">
                                    <select name="publisitas" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <?php
                                        foreach ($datas as $val) {
                                            if ($datax[0][0] == $val) {
                                                echo "<option selected value='$val'>$val</option>";
                                            } else {
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Pemasaran Langsung</label>
                                <div class="col-sm-5">
                                    <select name="pem_lan" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <option selected>Choose...</option>
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div> -->
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-12" style="text-align:right">
                                <button type="submit" value="simpan" name="simpan" class="btn btn-primary col-sm-2">Simpan</button>
                                <a class="btn btn-success  col-sm-2" href="form-promosi.php" role="button">Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>

                    <!-- DataTales Example -->


                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Select "Logout" below if you are ready to end your current session.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                        Cancel
                    </button>
                    <a class="btn btn-primary" href="../../action/log_out.php">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <!-- fontawasome -->
    <script src="https://kit.fontawesome.com/f6531d317e.js" crossorigin="anonymous"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>
</body>

</html>
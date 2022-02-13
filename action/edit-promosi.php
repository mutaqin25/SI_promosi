<?php
include '../config.php';



if (isset($_POST['simpan'])) {
    // menangkap data yang di kirim dari form

    $id_promosi = $_POST['id_promosi'];
    $periklanan = $_POST['periklanan'];
    $penjualan_per = $_POST['pen_per'];
    $promosi_pen = $_POST['pro_pen'];
    $publisitas = $_POST['publisitas'];
    $pemasaran_lan = $_POST['pem_lan'];
    $id_pengguna = $_SESSION['id_pengguna'];



    // menginput data ke database
    $sql = "UPDATE promosi SET  periklanan='$periklanan', penjualanpersonal='$penjualan_per', promosipenjualan='$promosi_pen', publisitas='$publisitas', pemasaranlangsung='$pemasaran_lan', id_pengguna='$id_pengguna' WHERE id_promosi='$id_promosi'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        $_SESSION['status'] = "sukses";
        header('Location: ../view/Layout-Marketing/form-promosi.php');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        $_SESSION['status'] = "gagal";
        header('Location: ../view/Layout-Marketing/form-promosi.php');
    }
} else {
    die("gagal menginputkan data");
}

<?php
include '../config.php';


if (isset($_GET['id]']) == "") {

    $id = $_GET['id'];

    // ambil data foto
    $cek_data = mysqli_query($conn, "SELECT foto AS file FROM produk WHERE id_produk=$id");
    $data = mysqli_fetch_array($cek_data);
    $foto = $data['file'];

    $sql = "DELETE FROM produk WHERE id_produk=$id";
    $query = mysqli_query($conn, $sql);
    unlink('../images/produk/' . $foto);

    if ($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        $_SESSION['status'] = "sukses";
        header('Location: ../view/Layout-Marketing/form-produk.php');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        $_SESSION['status'] = "gagal";
        header('Location: ../view/Layout-Marketing/form-produk.php');
    }
} else {
    echo $_GET['id'];
}

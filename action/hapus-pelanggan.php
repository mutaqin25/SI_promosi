<?php
include '../config.php';

if (isset($_GET['id]']) == "") {

    $id = $_GET['id'];

    $sql = "DELETE FROM pelanggan WHERE id_pelanggan=$id";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        $_SESSION['status'] = "sukses";
        header('Location: ../view/Layout-Marketing/form-pelanggan.php');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        $_SESSION['status'] = "gagal";
        header('Location: ../view/Layout-Marketing/form-pelanggan.php');
    }
} else {
    echo $_GET['id'];
}

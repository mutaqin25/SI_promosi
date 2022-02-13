<?php
include '../config.php';

if (isset($_GET['id]']) == "") {

    $id = $_GET['id'];

    $sql1 = "DELETE FROM promosi WHERE kd_promosi=$id";
    $query1 = mysqli_query($conn, $sql1);

    $sql2 = "DELETE FROM kriteria_promosi WHERE kd_promosi=$id";
    $query2 = mysqli_query($conn, $sql2);

    if ($query1 && $query2) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        // $_SESSION['status'] = "sukses";
        header('Location: ../view/Layout-Marketing/form-promosi.php');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        $_SESSION['status'] = "gagal";
        header('Location: ../view/Layout-Marketing/form-promosi.php');
    }
} else {
    echo $_GET['id'];
}

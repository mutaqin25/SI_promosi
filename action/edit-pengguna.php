<?php
include '../config.php';
session_start();

if (isset($_POST['simpan'])) {
    // menangkap data yang di kirim dari form

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jenis_user = $_POST['jenis_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];


    // menginput data ke database
    $sql = "UPDATE pengguna SET  nama='$nama', jenis_user='$jenis_user', username='$username', email='$email', password='$password' WHERE id_pengguna='$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        $_SESSION['status'] = "sukses";
        header('Location: ../view/Layout-Admin/form-pengguna.php');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        $_SESSION['status'] = "gagal";
        header('Location: ../view/Layout-Admin/form-pengguna.php');
    }
} else {
    die("gagal menginputkan data");
}

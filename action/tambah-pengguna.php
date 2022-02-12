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

    // membuat id
    $cek_id = mysqli_query($conn, "select max(id_pengguna) as kode from pengguna");
    $jumlah = mysqli_fetch_array($cek_id);
    $no = $jumlah['kode'];
    $id = $no + 1;


    // menginput data ke database
    $sql = "INSERT INTO pengguna (id_pengguna, nama, jenis_user, username, email, password) VALUE ('$id', '$nama', '$jenis_user', '$username', '$email', '$password')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        $_SESSION['status'] = "sukses";
        $_SESSION['message'] = "<strong>Sukses!</strong> Data Berhasil Disimpan!";
        header('Location: ../view/Layout-Admin/form-pengguna.php');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        $_SESSION['status'] = "gagal";
        $_SESSION['message'] = "<strong>Gagal!</strong> Data Gagal Disimpan!";
        header('Location: ../view/Layout-Admin/form-pengguna.php');
    }
} else {
    die("gagal menginputkan data");
}

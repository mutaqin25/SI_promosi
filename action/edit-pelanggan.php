<?php
include '../config.php';
session_start();

if (isset($_POST['simpan'])) {
    // menangkap data yang di kirim dari form

    $id_pelanggan = $_POST['id_pelanggan'];
    $id_pengguna = $_SESSION['id_pengguna'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];


    // menginput data ke database
    $sql = "UPDATE pelanggan SET id_pengguna='$id_pengguna', nama='$nama', no_hp='$no_hp', email='$email'  WHERE id_pelanggan='$id_pelanggan'";
    $query = mysqli_query($conn, $sql);
    // echo mysqli_error($conn);
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
    die("gagal menginputkan data");
}

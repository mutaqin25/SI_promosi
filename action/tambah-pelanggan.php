<?php
include '../config.php';
session_start();

if (isset($_POST['simpan'])) {
    // menangkap data yang di kirim dari form

    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $id_pengguna = $_SESSION['id_pengguna'];

    // membuat id
    $cek_id = mysqli_query($conn, "select max(id_pelanggan) as kode from pelanggan");
    $jumlah = mysqli_fetch_array($cek_id);
    $no = $jumlah['kode'];
    $id = $no + 1;


    // menginput data ke database
    $sql = "INSERT INTO pelanggan (id_pelanggan, id_pengguna, nama, no_hp, email) VALUE ('$id', '$id_pengguna', '$nama', '$no_hp', '$email')";
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

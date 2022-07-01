<?php
include '../config.php';
session_start();


$nama = $_POST['nama'];
$harga = $_POST['harga'];
$id_produk = $_POST['id_produk'];
$foto_lama = $_POST['foto_lama'];
$filename = $_FILES['foto']['name'];
$id_pengguna = $_SESSION['id_pengguna'];



$rand = rand();
$ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array($ext, $ekstensi)) {
    mysqli_query($conn, "UPDATE produk SET id_pengguna='$id_pengguna', nama_produk='$nama', harga_produk='$harga' WHERE id_produk='$id_produk'");
    $_SESSION['status'] = "sukses";
    $_SESSION['message'] = "<strong>Sukses!</strong> Data Berhasil Disimpan!";
    header("location:../view/Layout-Marketing/form-produk.php");
} else {
    if ($ukuran < 1044070) {
        $xx = $rand . '_' . $filename;
        move_uploaded_file($_FILES['foto']['tmp_name'], '../images/produk/' . $rand . '_' . $filename);

        mysqli_query($conn, "UPDATE produk SET id_pengguna='$id_pengguna', nama_produk='$nama', harga_produk='$harga', foto='$xx' WHERE id_produk='$id_produk'");

        unlink('../images/produk/' . $foto_lama);
        $_SESSION['status'] = "sukses";
        $_SESSION['message'] = "<strong>Sukses!</strong> Data Berhasil Disimpan!";
        header("location:../view/Layout-Marketing/form-produk.php");
        echo mysqli_error($conn);
    } else {
        $_SESSION['status'] = "gagal";
        $_SESSION['message'] = "<strong>Gagal!</strong> Data Gagal Disimpan!";
        header("location:../view/Layout-Marketing/form-produk.php");
    }
}

<?php
include '../config.php';
session_start();


$nama = $_POST['nama'];
$harga = $_POST['harga'];
$id_pengguna = $_SESSION['id_pengguna'];

// membuat id
$cek_id = mysqli_query($conn, "select max(id_produk) as kode from produk");
$jumlah = mysqli_fetch_array($cek_id);
$no = $jumlah['kode'];

if ($no == "") {
    $id = 1;
} else {
    $id = $no + 1;
}

$rand = rand();
$ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array($ext, $ekstensi)) {
    header("location:../view/Layout-Marketing/form-produk");
} else {
    if ($ukuran < 1044070) {
        $xx = $rand . '_' . $filename;
        move_uploaded_file($_FILES['foto']['tmp_name'], '../images/produk/' . $rand . '_' . $filename);
        mysqli_query($conn, "INSERT INTO produk VALUES('$id', '$id_pengguna', '$nama','$harga','$xx')");
        header("location:../view/Layout-Marketing/form-produk.php");
        echo mysqli_error($conn);
    } else {
        header("location:../view/Layout-Marketing/form-produk.php");
    }
}

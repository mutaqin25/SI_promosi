<?php
include '../config.php';

if (isset($_POST['simpan'])) {
    // menangkap data yang di kirim dari form

    $periklanan = $_POST['periklanan'];
    $penjualan_per = $_POST['pen_per'];
    $promosi_pen = $_POST['pro_pen'];
    $publisitas = $_POST['publisitas'];
    $pemasaran_lan = $_POST['pem_lan'];
    $id_pengguna = $_SESSION['id_pengguna'];

    // membuat id
    $cek_id = mysqli_query($conn, "select max(id_promosi) as kode from promosi");
    $jumlah = mysqli_fetch_array($cek_id);
    $no = $jumlah['kode'];

    if ($no == "") {
        $id = 1;
    } else {
        $id = $no + 1;
    }


    // menginput data ke database
    $sql = "INSERT INTO promosi (id_promosi, periklanan, penjualanpersonal, promosipenjualan, publisitas, pemasaranlangsung, id_pengguna) VALUE ('$id', '$periklanan', '$penjualan_per', '$promosi_pen', '$publisitas', '$pemasaran_lan', '$id_pengguna')";
    $query = mysqli_query($conn, $sql);
    echo mysqli_error($conn);
    if ($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        $_SESSION['status'] = "sukses";
        $_SESSION['message'] = "<strong>Sukses!</strong> Data Berhasil Disimpan!";
        header('Location: ../view/Layout-Marketing/form-promosi.php');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        $_SESSION['status'] = "gagal";
        $_SESSION['message'] = "<strong>Gagal!</strong> Data Gagal Disimpan!";
        header('Location: ../view/Layout-Marketing/form-promosi.php');
    }
} else {
    die("gagal menginputkan data");
}

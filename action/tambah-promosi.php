<?php
include '../config.php';

if (isset($_POST['simpan'])) {
    // menangkap data yang di kirim dari form
    // ========================================================================================= //
    $id_pengguna = $_SESSION['id_pengguna'];
    $id_produk = $_POST['id_produk'];
    //nilai preferensi kriteria
    $W = [5, 4, 4, 4, 3];

    // Alternatif 1
    $A1 = [];
    $A1[0] = $_POST['periklanan1'];
    $A1[1] = $_POST['pen_per1'];
    $A1[2] = $_POST['pro_pen1'];
    $A1[3] = $_POST['publisitas1'];
    $A1[4] = $_POST['pem_lan1'];

    // Alternatif 2
    $A2 = [];
    $A2[0] = $_POST['periklanan2'];
    $A2[1] = $_POST['pen_per2'];
    $A2[2] = $_POST['pro_pen2'];
    $A2[3] = $_POST['publisitas2'];
    $A2[4] = $_POST['pem_lan2'];

    // Alternatif 3
    $A3 = [];
    $A3[0] = $_POST['periklanan3'];
    $A3[1] = $_POST['pen_per3'];
    $A3[2] = $_POST['pro_pen3'];
    $A3[3] = $_POST['publisitas3'];
    $A3[4] = $_POST['pem_lan3'];

    // Alternatif 4
    $A4 = [];
    $A4[0] = $_POST['periklanan4'];
    $A4[1] = $_POST['pen_per4'];
    $A4[2] = $_POST['pro_pen4'];
    $A4[3] = $_POST['publisitas4'];
    $A4[4] = $_POST['pem_lan4'];

    // Alternatif 5
    $A5 = [];
    $A5[0] = $_POST['periklanan5'];
    $A5[1] = $_POST['pen_per5'];
    $A5[2] = $_POST['pro_pen5'];
    $A5[3] = $_POST['publisitas5'];
    $A5[4] = $_POST['pem_lan5'];

    $dataMat = [];
    $dataMat['A1'] = $A1;
    $dataMat['A2'] = $A2;
    $dataMat['A3'] = $A3;
    $dataMat['A4'] = $A4;
    $dataMat['A5'] = $A5;


    // Normalisasi
    $X1 = round(sqrt(pow($A1[0], 2) + pow($A2[0], 2) + pow($A3[0], 2) + pow($A4[0], 2) + pow($A5[0], 2)), 3);
    $X2 = round(sqrt(pow($A1[1], 2) + pow($A2[1], 2) + pow($A3[1], 2) + pow($A4[1], 2) + pow($A5[1], 2)), 3);
    $X3 = round(sqrt(pow($A1[2], 2) + pow($A2[2], 2) + pow($A3[2], 2) + pow($A4[2], 2) + pow($A5[2], 2)), 3);
    $X4 = round(sqrt(pow($A1[3], 2) + pow($A2[3], 2) + pow($A3[3], 2) + pow($A4[3], 2) + pow($A5[3], 2)), 3);
    $X5 = round(sqrt(pow($A1[4], 2) + pow($A2[4], 2) + pow($A3[4], 2) + pow($A4[4], 2) + pow($A5[4], 2)), 3);

    $R = [];

    $keys = array_keys($dataMat);
    for ($i = 0; $i < count($dataMat); $i++) {
        foreach ($dataMat[$keys[$i]] as $key => $value) {
            if ($key == 0) {
                if ($keys[$i] == 'A1') {
                    $R[0][0] = round($value / $X1, 3);
                } elseif ($keys[$i] == 'A2') {
                    $R[0][1] = round($value / $X1, 3);
                } elseif ($keys[$i] == 'A3') {
                    $R[0][2] = round($value / $X1, 3);
                } elseif ($keys[$i] == 'A4') {
                    $R[0][3] = round($value / $X1, 3);
                } elseif ($keys[$i] == 'A5') {
                    $R[0][4] = round($value / $X1, 3);
                }
            } elseif ($key == 1) {
                if ($keys[$i] == 'A1') {
                    $R[1][0] = round($value / $X2, 3);
                } elseif ($keys[$i] == 'A2') {
                    $R[1][1] = round($value / $X2, 3);
                } elseif ($keys[$i] == 'A3') {
                    $R[1][2] = round($value / $X2, 3);
                } elseif ($keys[$i] == 'A4') {
                    $R[1][3] = round($value / $X2, 3);
                } elseif ($keys[$i] == 'A5') {
                    $R[1][4] = round($value / $X2, 3);
                }
            } elseif ($key == 2) {
                if ($keys[$i] == 'A1') {
                    $R[2][0] = round($value / $X3, 3);
                } elseif ($keys[$i] == 'A2') {
                    $R[2][1] = round($value / $X3, 3);
                } elseif ($keys[$i] == 'A3') {
                    $R[2][2] = round($value / $X3, 3);
                } elseif ($keys[$i] == 'A4') {
                    $R[2][3] = round($value / $X3, 3);
                } elseif ($keys[$i] == 'A5') {
                    $R[2][4] = round($value / $X3, 3);
                }
            } elseif ($key == 3) {
                if ($keys[$i] == 'A1') {
                    $R[3][0] = round($value / $X4, 3);
                } elseif ($keys[$i] == 'A2') {
                    $R[3][1] = round($value / $X4, 3);
                } elseif ($keys[$i] == 'A3') {
                    $R[3][2] = round($value / $X4, 3);
                } elseif ($keys[$i] == 'A4') {
                    $R[3][3] = round($value / $X4, 3);
                } elseif ($keys[$i] == 'A5') {
                    $R[3][4] = round($value / $X4, 3);
                }
            } elseif ($key == 4) {
                if ($keys[$i] == 'A1') {
                    $R[4][0] = round($value / $X5, 3);
                } elseif ($keys[$i] == 'A2') {
                    $R[4][1] = round($value / $X5, 3);
                } elseif ($keys[$i] == 'A3') {
                    $R[4][2] = round($value / $X5, 3);
                } elseif ($keys[$i] == 'A4') {
                    $R[4][3] = round($value / $X5, 3);
                } elseif ($keys[$i] == 'A5') {
                    $R[4][4] = round($value / $X5, 3);
                }
            }
        }
    }


    // normalisasi dikalikan dengan preferensi
    $Y = [];
    $keys = array_keys($R);
    for ($i = 0; $i < count($R); $i++) {
        foreach ($R[$keys[$i]] as $key => $value) {
            if ($key == 0) {
                if ($keys[$i] == '0') {
                    $Y[0][0] = $W[0] * $value;
                } elseif ($keys[$i] == 1) {
                    $Y[0][1] = $W[1] * $value;
                } elseif ($keys[$i] == 2) {
                    $Y[0][2] = $W[2] * $value;
                } elseif ($keys[$i] == 3) {
                    $Y[0][3] = $W[3] * $value;
                } elseif ($keys[$i] == 4) {
                    $Y[0][4] = $W[4] * $value;
                }
            } elseif ($key == 1) {
                if ($keys[$i] == 0) {
                    $Y[1][0] = $W[0] * $value;
                } elseif ($keys[$i] == 1) {
                    $Y[1][1] = $W[1] * $value;
                } elseif ($keys[$i] == 2) {
                    $Y[1][2] = $W[2] * $value;
                } elseif ($keys[$i] == 3) {
                    $Y[1][3] = $W[3] * $value;
                } elseif ($keys[$i] == 4) {
                    $Y[1][4] = $W[4] * $value;
                }
            } elseif ($key == 2) {
                if ($keys[$i] == 0) {
                    $Y[2][0] = $W[0] * $value;
                } elseif ($keys[$i] == 1) {
                    $Y[2][1] = $W[1] * $value;
                } elseif ($keys[$i] == 2) {
                    $Y[2][2] = $W[2] * $value;
                } elseif ($keys[$i] == 3) {
                    $Y[2][3] = $W[3] * $value;
                } elseif ($keys[$i] == 4) {
                    $Y[2][4] = $W[4] * $value;
                }
            } elseif ($key == 3) {
                if ($keys[$i] == 0) {
                    $Y[3][0] = $W[0] * $value;
                } elseif ($keys[$i] == 1) {
                    $Y[3][1] = $W[1] * $value;
                } elseif ($keys[$i] == 2) {
                    $Y[3][2] = $W[2] * $value;
                } elseif ($keys[$i] == 3) {
                    $Y[3][3] = $W[3] * $value;
                } elseif ($keys[$i] == 4) {
                    $Y[3][4] = $W[4] * $value;
                }
            } elseif ($key == 4) {
                if ($keys[$i] == 0) {
                    $Y[4][0] = $W[0] * $value;
                } elseif ($keys[$i] == 1) {
                    $Y[4][1] = $W[1] * $value;
                } elseif ($keys[$i] == 2) {
                    $Y[4][2] = $W[2] * $value;
                } elseif ($keys[$i] == 3) {
                    $Y[4][3] = $W[3] * $value;
                } elseif ($keys[$i] == 4) {
                    $Y[4][4] = $W[4] * $value;
                }
            }
        }
    }
    $max = [];
    $min = [];
    $DPlus = [];
    $DMin  = [];
    $V = [];

    $Maxs = [];
    $Maxs[0][0] = $Y[0][0];
    $Maxs[0][1] = $Y[1][0];
    $Maxs[0][2] = $Y[2][0];
    $Maxs[0][3] = $Y[3][0];
    $Maxs[0][4] = $Y[4][0];

    $Maxs[1][0] = $Y[0][1];
    $Maxs[1][1] = $Y[1][1];
    $Maxs[1][2] = $Y[2][1];
    $Maxs[1][3] = $Y[3][1];
    $Maxs[1][4] = $Y[4][1];

    $Maxs[2][0] = $Y[0][2];
    $Maxs[2][1] = $Y[1][2];
    $Maxs[2][2] = $Y[2][2];
    $Maxs[2][3] = $Y[3][2];
    $Maxs[2][4] = $Y[4][2];

    $Maxs[3][0] = $Y[0][3];
    $Maxs[3][1] = $Y[1][3];
    $Maxs[3][2] = $Y[2][3];
    $Maxs[3][3] = $Y[3][3];
    $Maxs[3][4] = $Y[4][3];

    $Maxs[4][0] = $Y[0][4];
    $Maxs[4][1] = $Y[1][4];
    $Maxs[4][2] = $Y[2][4];
    $Maxs[4][3] = $Y[3][4];
    $Maxs[4][4] = $Y[4][4];

    // mencari nilai max
    $max[0] = max($Maxs[0]);
    $max[1] = max($Maxs[1]);
    $max[2] = max($Maxs[2]);
    $max[3] = max($Maxs[3]);
    $max[4] = max($Maxs[4]);

    // mencari Nilai min
    $min[0] = min($Maxs[0]);
    $min[1] = min($Maxs[1]);
    $min[2] = min($Maxs[2]);
    $min[3] = min($Maxs[3]);
    $min[4] = min($Maxs[4]);

    // Jarak nilai Terbobot
    $DPlus[0] = round(sqrt(pow(($Maxs[0][0] - $max[0]), 2) + pow(($Maxs[1][0] - $max[1]), 2) + pow(($Maxs[2][0] - $max[2]), 2) + pow(($Maxs[3][0] - $max[3]), 2) + pow(($Maxs[4][0] - $max[4]), 2)), 3);
    $DPlus[1] = round(sqrt(pow(($Maxs[0][1] - $max[0]), 2) + pow(($Maxs[1][1] - $max[1]), 2) + pow(($Maxs[2][1] - $max[2]), 2) + pow(($Maxs[3][1] - $max[3]), 2) + pow(($Maxs[4][1] - $max[4]), 2)), 3);
    $DPlus[2] = round(sqrt(pow(($Maxs[0][2] - $max[0]), 2) + pow(($Maxs[1][2] - $max[1]), 2) + pow(($Maxs[2][3] - $max[2]), 2) + pow(($Maxs[3][2] - $max[3]), 2) + pow(($Maxs[4][2] - $max[4]), 2)), 3);
    $DPlus[3] = round(sqrt(pow(($Maxs[0][3] - $max[0]), 2) + pow(($Maxs[1][3] - $max[1]), 2) + pow(($Maxs[2][3] - $max[2]), 2) + pow(($Maxs[3][3] - $max[3]), 2) + pow(($Maxs[4][3] - $max[4]), 2)), 3);
    $DPlus[4] = round(sqrt(pow(($Maxs[0][4] - $max[0]), 2) + pow(($Maxs[1][4] - $max[1]), 2) + pow(($Maxs[2][3] - $max[2]), 2) + pow(($Maxs[3][4] - $max[3]), 2) + pow(($Maxs[4][4] - $max[4]), 2)), 3);

    $DMin[0] = round(sqrt(pow(($Maxs[0][0] - $min[0]), 2) + pow(($Maxs[1][0] - $min[1]), 2) + pow(($Maxs[2][0] - $min[2]), 2) + pow(($Maxs[3][0] - $min[3]), 2) + pow(($Maxs[4][0] - $min[4]), 2)), 3);
    $DMin[1] = round(sqrt(pow(($Maxs[0][1] - $min[0]), 2) + pow(($Maxs[1][1] - $min[1]), 2) + pow(($Maxs[2][1] - $min[2]), 2) + pow(($Maxs[3][1] - $min[3]), 2) + pow(($Maxs[4][1] - $min[4]), 2)), 3);
    $DMin[2] = round(sqrt(pow(($Maxs[0][2] - $min[0]), 2) + pow(($Maxs[1][2] - $min[1]), 2) + pow(($Maxs[2][3] - $min[2]), 2) + pow(($Maxs[3][2] - $min[3]), 2) + pow(($Maxs[4][2] - $min[4]), 2)), 3);
    $DMin[3] = round(sqrt(pow(($Maxs[0][3] - $min[0]), 2) + pow(($Maxs[1][3] - $min[1]), 2) + pow(($Maxs[2][3] - $min[2]), 2) + pow(($Maxs[3][3] - $min[3]), 2) + pow(($Maxs[4][3] - $min[4]), 2)), 3);
    $DMin[4] = round(sqrt(pow(($Maxs[0][4] - $min[0]), 2) + pow(($Maxs[1][4] - $min[1]), 2) + pow(($Maxs[2][3] - $min[2]), 2) + pow(($Maxs[3][4] - $min[3]), 2) + pow(($Maxs[4][4] - $min[4]), 2)), 3);

    $V[0] = round($DMin[0] / ($DMin[0] + $DPlus[0]), 3);
    $V[1] = round($DMin[1] / ($DMin[1] + $DPlus[1]), 3);
    $V[2] = round($DMin[2] / ($DMin[2] + $DPlus[2]), 3);
    $V[3] = round($DMin[3] / ($DMin[3] + $DPlus[3]), 3);
    $V[4] = round($DMin[4] / ($DMin[4] + $DPlus[4]), 3);


    // membuat id
    $cek_id1 = mysqli_query($conn, "select max(id_promosi) as kode from promosi");
    $jumlah1 = mysqli_fetch_array($cek_id1);
    $no1 = $jumlah1['kode'];

    // membuat id
    $cek_kd2 = mysqli_query($conn, "select max(kd_promosi) as kodes from promosi");
    $jumlah2 = mysqli_fetch_array($cek_kd2);
    $no2 = $jumlah2['kodes'];

    if ($no1 == "" && $no2 == "") {
        $id1 = 1;
        $id2 = 2;
        $id3 = 3;
        $id4 = 4;
        $id5 = 5;

        $kd1 = 1;
        $kd2 = 2;
        $kd3 = 3;
        $kd4 = 4;
        $kd5 = 5;
    } else {
        $id1 = $no1 + 1;
        $id2 = $no1 + 2;
        $id3 = $no1 + 3;
        $id4 = $no1 + 4;
        $id5 = $no1 + 5;

        $kd1 = $no2 + 1;
        $kd2 = $no2 + 2;
        $kd3 = $no2 + 3;
        $kd4 = $no2 + 4;
        $kd5 = $no2 + 5;
    }


    // menginput data ke database
    // $sql = "INSERT INTO promosi (id_promosi, periklanan, penjualanpersonal, promosipenjualan, publisitas, pemasaranlangsung, id_pengguna) VALUE ('$id', '$periklanan', '$penjualan_per', '$promosi_pen', '$publisitas', '$pemasaran_lan', '$id_pengguna')";
    $sql = "INSERT INTO promosi (id_promosi, periklanan, penjualanpersonal, promosipenjualan, publisitas, pemasaranlangsung, id_pengguna, id_produk, kd_promosi) VALUE 
    ('$id1', '$A1[0]', '$A1[1]', '$A1[2]', '$A1[3]', '$A1[4]', '$id_pengguna', '$id_produk', '$kd1'), 
    ('$id2', '$A2[0]', '$A2[1]', '$A2[2]', '$A2[3]', '$A2[4]', '$id_pengguna', '$id_produk', '$kd2'), 
    ('$id3', '$A3[0]', '$A3[1]', '$A3[2]', '$A3[3]', '$A3[4]', '$id_pengguna', '$id_produk', '$kd3'), 
    ('$id4', '$A4[0]', '$A4[1]', '$A4[2]', '$A4[3]', '$A4[4]', '$id_pengguna', '$id_produk', '$kd4'),
    ('$id5', '$A5[0]', '$A5[1]', '$A5[2]', '$A5[3]', '$A5[4]', '$id_pengguna', '$id_produk', '$kd5')
    ";

    // Mencari nilai maksimal
    arsort($V);
    $max = max($V);

    // buat tabelnya

    // membuat id kriteria_promosi
    $cek_id3 = mysqli_query($conn, "select max(id) as kode from kriteria_promosi");
    $jumlah3 = mysqli_fetch_array($cek_id3);
    $no3 = $jumlah3['kode'];
    $cek_kd4 = mysqli_query($conn, "select max(kd_promosi) as kode from kriteria_promosi");
    $jumlah4 = mysqli_fetch_array($cek_kd4);
    $no4 = $jumlah4['kode'];

    if ($no3 == "" && $no4 == "") {
        $id_kt = 1;
        $kd = 1;
    } else {
        $id_kt = $no3 + 1;
        $kd = $no4 + 1;
    }


    $sql1 = "INSERT INTO kriteria_promosi (id, id_produk, kd_promosi, A1, A2, A3, A4, A5, max) VALUE 
    ('$id_kt', '$id_produk', '$kd', '$V[0]', '$V[1]', '$V[2]', '$V[3]', '$V[4]', '$max')
    ";

    $query = mysqli_query($conn, $sql);
    $query = mysqli_query($conn, $sql1);
    echo $sql;
    echo $sql1;


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

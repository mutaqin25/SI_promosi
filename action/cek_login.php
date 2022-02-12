<?php 
 
// menghubungkan php dengan koneksi database
include '../config.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from pengguna where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['jenis_user'] == "admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jenis_user'] = "admin";
        $_SESSION['nama'] = $data['nama'];
		// alihkan ke halaman dashboard admin
		header("location:../view/Dashboard/dashboard-admin.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['jenis_user']=="general manager"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jenis_user'] = "general manager";
        $_SESSION['nama'] = $data['nama'];
		// alihkan ke halaman dashboard pegawai
		header("location:../view/Dashboard/dashboard-manager.php");
 
	// cek jika user login sebagai pengurus
	}else if($data['jenis_user']=="marketing"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jenis_user'] = "marketing";
        $_SESSION['nama'] = $data['nama'];
		// alihkan ke halaman dashboard pengurus
		header("location:../view/Dashboard/dashboard-marketing.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:../index.php?pesan=gagal");
	}	
}else{
	header("location:../index.php?pesan=gagal");
}
 
?>
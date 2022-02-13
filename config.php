<?php
// mengaktifkan session pada php
session_start();
error_reporting();

$conn = mysqli_connect("localhost", "root", "", "si_promosi");

// Check connection
if (mysqli_connect_errno()) {
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

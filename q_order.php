<?php
require 'server/config.php';

session_start();
$user_id = $_SESSION['user_id'];

if (isset($_POST['btn-order'])) {

	$jadwal = $_POST['id_jadwal'];
	$nama = mysqli_real_escape_string($conn, $_POST['nama']);
	$no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
	$kategori_penumpang = mysqli_real_escape_string($conn, $_POST['kategori_penumpang']);
	$tgl_order = mysqli_real_escape_string($conn, $_POST['tgl_order']);
	$kode_transaksi = random_int(1000000000,100000000000000);
	$status_transaksi = "menunggu pembayaran";
	$id_user = $user_id;
	$id_jadwal = $jadwal;
	
	$sql4 = "SELECT tanggal FROM jadwal WHERE $jadwal = id";
	$result4 = mysqli_query($conn, $sql4); 

	$data = $result4->fetch_array();
	$tanggal = $data['tanggal'];

	// order
	$sql = " INSERT INTO `order` (nama, no_hp, kategori_penumpang, tgl_order, id_user, id_jadwal ) VALUES ('$nama', '$no_hp', '$kategori_penumpang', '$tgl_order', '$id_user', '$id_jadwal' )";
	$result = mysqli_query($conn, $sql);
	$id_order = $conn->insert_id;
	// tiket (adding durasi)
	$sql2 = "INSERT INTO tiket (nama, no_hp, kategori_penumpang, tgl_berangkat, id_user, id_jadwal ) VALUES ('$nama', '$no_hp', '$kategori_penumpang', '$tanggal', '$id_user', '$id_jadwal')";
	$result2 = mysqli_query($conn, $sql2);
	// transaksi 
	$sql3 = "INSERT INTO transaksi (kode_transaksi, status_transaksi, id_order) VALUES ('$kode_transaksi', '$status_transaksi', '$id_order')";
	$result3 = mysqli_query($conn, $sql3);

	if ($result === true) {
		header("location:myorder.php?id=$conn->insert_id");
	} else {
		$message = "Gagal memasukan ke database";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
}

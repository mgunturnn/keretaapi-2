<?php
require 'server/config.php';
require 'pages/templates/header.php';
require 'pages/navbar/navbar.php';

$_id = $_GET['id'];
// $_payment_code = $_GET['kode_transaksi'];

// $sql2 = "SELECT id_order FROM transaksi WHERE $_id = id";
// $result2 = mysqli_query($conn, $sql2);
// $data2 = $result2->fetch_array();
// $id_order = $data2['id_order'];

$sql = "SELECT tiket.*, jadwal.*, transaksi.* 
		FROM tiket, jadwal, transaksi
		WHERE transaksi.id = '$_id'
		AND jadwal.id = tiket.id_jadwal;";
$result = mysqli_query($conn, $sql);

$sql1 = "SELECT kode_transaksi FROM transaksi WHERE $_id = id";
$result1 = mysqli_query($conn, $sql1);
$data1 = $result1->fetch_array();
$kode_transaksi = $data1['kode_transaksi'];

$sql2 = "UPDATE transaksi
		SET status_transaksi = 'transaksi sukses' 
		WHERE id = $_id";
$result2 = mysqli_query($conn, $sql2);

$sql3 = "SELECT status_transaksi FROM transaksi WHERE $_id = id";
$result3 = mysqli_query($conn, $sql3);
$data2 = $result3->fetch_array();
$status_transaksi = $data2['status_transaksi'];

// function

// if ($=== true) {
// 	header("location:delete_process.php?id=$_id");
// }

// munculin harga
while ($row = mysqli_fetch_array($result)) {
	$nama = $row['nama'];
	$asal_rute = $row['asal_rute'];
	$tujuan_rute = $row['tujuan_rute'];
	$tgl_berangkat = $row['tgl_berangkat'];
	$harga = $row['harga'];
	$penumpang = $row['jml_penumpang'];
	$total_harga = $harga * $penumpang;

?>



	<div class="container">
		<div class="jumbotron-fluid mt-5">
			<div class="title text-center">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-8">
							<h1 class="mb-5">Tiket</h1>
							<table class="table table-bordered">

								<tbody class="text-left">
									<tr>
										<th scope="row">Kode Tiket</th>
										<td><?= $kode_transaksi; ?></td>
									</tr>
									<tr>
										<th scope="row">Nama Penumpang</th>
										<td><?= $row['nama'] ?></td>
									</tr>
									<tr>
										<th scope="row">Asal Stasiun</th>
										<td><?= $row['asal_rute'] ?></td>
									</tr>
									<tr>
									<tr>
										<th scope="row">Tujuan Stasiun</th>
										<td><?= $row['tujuan_rute'] ?></td>
									</tr>
									<tr>
										<th scope="row">Tanggal Keberangkatan</th>
										<td><?= $tgl_berangkat; ?></td>
									</tr>
										<th scope="row">Harga</th>
										<td><?= $row['harga'] ?></td>
									</tr>
									<tr>
										<th scope="row">Jumlah Penumpang</th>
										<td><?= $row['jml_penumpang']; ?></td>
									</tr>
									<tr>
										<th scope="row">Status Transaksi</th>
										<td><?= $status_transaksi; ?></td>
									</tr>
									<tr>
										<td>
											<h3>Total</h3>
										</td>
										<td>
											<h3><?= $total_harga; ?></h3>
										</td>
									</tr>
								</tbody>
							</table>
							<!-- <form action="delete_process.php" method="POST">
								<button type="submit" name="delete_button" class="btn btn-primary">Selesaikan Pesanan</button>
							</form> -->
							<br />
							<button onclick="window.print()" class="btn btn-primary">Cetak Tiket</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
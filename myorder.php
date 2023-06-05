<?php 
	require 'server/config.php';
	session_start();
	$id = $_SESSION['user_id'];
	require 'pages/templates/header.php';
	require 'pages/navbar/navbar.php';

	$sql = "SELECT tiket.*, jadwal.*, transaksi.id as paid, transaksi.id_order, transaksi.kode_transaksi as pacod, transaksi.*
	FROM tiket, jadwal, transaksi
	WHERE tiket.id_user = '$id'
	AND jadwal.id = tiket.id_jadwal;";
	$result = mysqli_query($conn,$sql);
 ?>

 
<div class="container mt-5">
	<div class="title">
		<h3>Order</h3>
	</div>
	<table class="table">
		<thead>
			<tr>
			<th scope="col">No</th>
			<th scope="col">Nama</th>
			<th scope="col">No HP</th>
			<th scope="col">Kategori Penumpang</th>
			<th scope="col">Status Transaksi</th>
			<th scope="col">Asal</th>
			<th scope="col">Tujuan</th>
			<th>Harga</th>
			<th>Total</th>
			<th>Bayar</th>
			</tr>
		</thead>
		<tbody class="body-payment">
			<?php 
				$i = 1;
				while($row = mysqli_fetch_array($result)){
					$harga = $row['harga'];
					$penumpang = $row['jml_penumpang'];
					$total_harga = $harga * $penumpang;
					$paid = $row['paid'];
					$pacod = $row['pacod'];
					
			 ?>
			<tr>
				
				<th scope="row"><?=$i++?></th>
				<td><?=$row['nama']?></td>
				<td><?=$row['no_hp']?></td>
				<td><?=$row['kategori_penumpang']?></td>
				<td><?=$row['status_transaksi']?></td>
				<td style="<?=$a;?>"><?=$row['asal_rute']?></td>
				<td><?=$row['tujuan_rute']?></td>
				<td><?=$harga;?></td>
				<td><?=$total_harga;?></td>
				<td>
					<a href="payment.php?id=<?=$paid;?>&paymentUrl=<?=$pacod;?>" class="btn btn-primary">Bayar</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>	


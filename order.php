<?php
require 'server/config.php';
session_start();
$id = $_SESSION['user_id'];
$bytes = random_bytes(10);
$_code = random_bytes(20);
$id_payment = random_bytes(5);
$id_jadwal = $_GET['id'];


require 'pages/templates/header.php';
require 'pages/navbar/navbar.php';
?>
<div class="wrapper">
	<div class="jumbotron text-center bg-dark header">
		<div class="text-white">
			<h4>Sistem Pemesanan Tiket Kereta Api</h4>
		</div>
	</div>
	<div class="container">
		<div class="jumbotron box-search bg-light">
			<div class="col-sm-12  overflow-auto">
				<div class="container">
					<div class="col-lg-12">
						<h2>Isi data anda dengan lengkap!</h2>
					</div>
					<div class="dropdown-divider"></div>
					<form method="post" action="q_order.php">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" class="form-control" name="id_jadwal" value="<?= $id_jadwal ?>" hidden>
								<input type="text" class="form-control" name="nama" placeholder="masukkan nama" required="required">
							</div>
							<div class="form-group">
								<label>No HP</label>
								<input type="text" class="form-control" name="no_hp" placeholder="masukkan no hp" required="required">
							</div>
							<div class="form-group">
								<label>Kategori Penumpang</label>
								<input type="text" class="form-control" name="kategori_penumpang" placeholder="dewasa atau anak" required="required">
							</div>
							<div class="col-sm-10">
								<div class="row">
									<div class="form-group">
										<label>Tanggal Order</label>
										<input type="date" class="form-control" name="tgl_order" required="required">
									</div>
								</div>
							</div>
							<input type="submit" class="btn btn-primary" name="btn-order" value="submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>


?>

<?php include 'pages/templates/footer.php'; ?>

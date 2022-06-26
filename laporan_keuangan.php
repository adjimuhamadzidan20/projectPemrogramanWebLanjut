<?php  
	// koneksi
	require 'config/koneksi_db.php';

	// show data
	$show = "SELECT dt_anggota.ID_anggota, dt_anggota.Nama_lengkap, dt_keuangan.Tanggal_Pembayaran,dt_keuangan.Nominal, 
	dt_keuangan.Keterangan FROM dt_anggota, dt_keuangan WHERE dt_anggota.ID_anggota = dt_keuangan.ID_anggota";

	$showData = mysqli_query($koneksi, $show);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Keuangan</title>
	<!-- css data keuangan -->
	<style>
		main .container {
			display: flex;
			justify-content: center;
			/*background-color: lightgrey;*/
			position: fixed;
		  	width: 100%;
		  	height: 100%;
		}

		
		main .container .simpan {
			cursor: pointer;
			padding: 4px 2px;
			box-sizing: border-box;
			width: 70px;
			margin-top: 15px;
		}

		.tabel-data {
			width: 75%;
			padding: 40px 20px;
			/*background-color: lightgrey;*/
		}

		.tabel-data table {
			margin-top: 12px;
			width: 100%;
			text-align: center;
		}

		.tabel-data table tr th, td {
			padding: 5px 8px;
		}

		main .tabel-data table .edit, .hapus {
			cursor: pointer;
			padding: 4px 2px;
			box-sizing: border-box;
			width: 70px;
		}

	</style>
</head>
<body>
	<nav>
		<?php require 'modularitas/menu.php' ?>
	</nav>
	<main>
		<div class="container">
			<div class="tabel-data">
				<h2>Laporan Keuangan</h2>
				<table border="1" cellspacing="0">
					<tr>
						<th>ID Anggota</th>
						<th>Nama Lengkap</th>
						<th>Tanggal Pembayaran</th>
						<th>Nominal</th>
						<th>Keterangan</th>
					</tr>
					<?php while($data = mysqli_fetch_assoc($showData)) : ?>
						<tr>
							<td><?= $data['ID_anggota'];?></td>
							<td><?= $data['Nama_lengkap'];?></td>
							<td><?= $data['Tanggal_Pembayaran'];?></td>
							<td><?= $data['Nominal'];?></td>
							<td><?= $data['Keterangan'];?></td>
						</tr>
					<?php endwhile; ?>
				</table><br>
				<a href="keuangan.php">Kembali</a>
				<footer>
					<?php require 'modularitas/footer.php' ?>
				</footer>
			</div>
		</div>
	</main>
</body>
</html>
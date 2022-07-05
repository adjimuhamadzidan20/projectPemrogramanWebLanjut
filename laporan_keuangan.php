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
	<link rel="stylesheet" href="fontawesome/css/all.min.css">
	<!-- css data keuangan -->
	<style>
		body {
			font-family: "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
		}

		main .container {
			display: flex;
			justify-content: center;
			/*background-color: lightgrey;*/
			position: fixed;
		  	width: 100%;
		  	height: 100%;
		}

		.tabel-data {
			width: 75%;
			padding: 40px 20px;
			/*background-color: lightgrey;*/
		}

		.tabel-data table {
			margin-top: 12px;
			width: 100%;
			background-color: #F9F9F9;
			border: none;
			text-align: center;
		}

		.tabel-data table th {
			background-color: #2c2c54;
			color: white;
		}

		.tabel-data table tr th, td {
			padding: 6px 8px;
		}

		.tabel-data button {
			cursor: pointer;
			padding: 6px 2px;
			box-sizing: border-box;
			width: 80px;
			border: 1px solid grey;
		}

		.tabel-data button:hover {
			background-color: #dfe4ea;
			transition: 0.1s;
		}

	</style>
</head>
<body>
	<main>
		<div class="container">
			<div class="tabel-data">
				<h2>Laporan Keuangan</h2>
				<table border="0" cellspacing="0">
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
				<a href="keuangan.php"><button type="button"><i class="fa-solid fa-arrow-left"></i> Kembali</button></a>
				<footer>
					<?php require 'modularitas/footer.php' ?>
				</footer>
			</div>
		</div>
	</main>

	<script type="text/javascript" src="fontawesome/js/all.min.js"></script>
</body>
</html>
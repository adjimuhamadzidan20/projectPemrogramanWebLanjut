<?php  
	// koneksi
	require 'config/koneksi_db.php';

	// show data
	$show = "SELECT dt_cabang.ID_cabang,dt_cabang.Nama_cabang, dt_jadwal_latihan.Hari FROM 
	dt_cabang, dt_jadwal_latihan WHERE dt_cabang.ID_cabang = dt_jadwal_latihan.ID_cabang";

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
				<h2>Laporan Jadwal Latihan</h2>
				<table border="0" cellspacing="0">
					<tr>
						<th>ID Cabang</th>
						<th>Nama Cabang</th>
						<th>Jadwal Latihan</th>
					</tr>
					<?php while($data = mysqli_fetch_assoc($showData)) : ?>
						<tr>
							<td><?= $data['ID_cabang'];?></td>
							<td><?= $data['Nama_cabang'];?></td>
							<td><?= $data['Hari'];?></td>
						</tr>
					<?php endwhile; ?>
				</table><br>
				<a href="jadwal.php"><button type="button"><i class="fa-solid fa-arrow-left"></i> Kembali</button></a>
				<footer>
					<?php require 'modularitas/footer.php' ?>
				</footer>
			</div>
		</div>
	</main>

	<script type="text/javascript" src="fontawesome/js/all.min.js"></script>
</body>
</html>
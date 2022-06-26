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
				<h2>Laporan Jadwal Latihan</h2>
				<table border="1" cellspacing="0">
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
				<a href="jadwal.php">Kembali</a>
				<footer>
					<?php require 'modularitas/footer.php' ?>
				</footer>
			</div>
		</div>
	</main>
</body>
</html>
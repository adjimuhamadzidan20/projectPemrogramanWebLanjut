<?php  
	// koneksi
	require 'config/koneksi_db.php';

	// menampilkan data
	// $show = "SELECT * FROM dt_anggota";
	// $showData = mysqli_query($koneksi, $show);
	// $result = mysqli_fetch_assoc($showData);

	// merubah data
	$sql = "SELECT * FROM dt_jadwal_latihan 
	INNER JOIN dt_pelatih ON dt_jadwal_latihan.ID_pelatih = dt_pelatih.ID_pelatih 
	INNER JOIN dt_cabang ON dt_jadwal_latihan.ID_cabang = dt_cabang.ID_cabang
	WHERE ID_latihan = $_GET[update]";

	$data = mysqli_query($koneksi, $sql);
	$hasil = mysqli_fetch_assoc($data);

	if (isset($_POST['edit_data'])) {
		$idjadwal = $_GET['update'];
		$hari_latihan = $_POST['hari_lat'];

		$query = "UPDATE dt_jadwal_latihan SET Hari = '$hari_latihan' WHERE ID_latihan = '$idjadwal'";

		mysqli_query($koneksi, $query);

		// refresh halaman
		echo "<meta http-equiv=refresh content=0.0>";

		// pop up
		echo "<script>alert('Data berhasil terupdate!');</script>";
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jadwal Latihan</title>
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

		main .container button {
			cursor: pointer;
			padding: 4px 2px;
			box-sizing: border-box;
			width: 228px;
			margin-bottom: 10px;
		}

		.form {
			background-color: #2c3e50;
			width: 25%;
			color: white;
			padding: 40px 20px;
		}

		.form .title-jadwal {
			margin-bottom: 36px;
		}

		.form .title-jadwal p {
			margin-top: 2px;
			font-size: 14px;
		}

		.form form input {
			margin-top: 4px;
			margin-bottom: 12px;
			width: 220px;
			height: 20px;
			padding: 2px;
		}

		.tabel-data {
			width: 75%;
			padding: 40px 20px;
		}

		.tabel-data table {
			margin-top: 12px;
		}

		.tabel-data table tr th, td {
			padding: 5px 10px;
		}

	</style>
</head>
<body>
	<nav>
		<?php require 'modularitas/menu.php' ?>
	</nav>
	<main>
		<div class="container">
			<div class="form">
				<div class="title-jadwal">
					<h1>Edit Jadwal<br>Latihan</h1>
					<p>Mengupdate data jadwal latihan</p>
				</div>
				<form action="" method="post">
					<label for="id_latihan">ID Latihan</label><br>
					<input type="text" id="id_latihan" name="id_latihan" value="<?= $hasil['ID_latihan'];?>" disabled><br>
					<label for="hari_latihan">Hari Latihan</label><br>
					<input type="text" id="hari_latihan" name="hari_lat" value="<?= $hasil['Hari'];?>"><br>
					<label for="pelatih">Nama Pelatih</label><br>
					<input type="text" id="pelatih" name="pelatih" value="<?= $hasil['ID_pelatih'];?>" disabled><br>
					<label for="cabang">Nama Cabang</label><br>
					<input type="text" id="cabang" name="cabang" value="<?= $hasil['ID_cabang'];?>" disabled><br>
					<button type="submit" name="edit_data" onclick="return confirm('Update data?');">Edit Data</button>
					<a href="jadwal.php">
						<button type="button">Kembali</button>
					</a>
				</form>
			</div>
			<div class="tabel-data">
				<h2>Jadwal Latihan</h2>
				<table border="1" cellspacing="0">
					<tr>
						<th>ID Latihan</th>
						<th>Hari Latihan</th>
						<th>Nama Pelatih</th>
						<th>ID Pelatih</th>
						<th>Nama Cabang</th>
						<th>ID Cabang</th>
					</tr>
					<tr>
						<td><?= $hasil['ID_latihan'];?></td>
						<td><?= $hasil['Hari'];?></td>
						<td><?= $hasil['Nama_pelatih'];?></td>
						<td><?= $hasil['ID_pelatih'];?></td>
						<td><?= $hasil['Nama_cabang'];?></td>
						<td><?= $hasil['ID_cabang'];?></td>
					</tr>
				</table>
				<footer>
					<?php require 'modularitas/footer.php' ?>
				</footer>
			</div>
		</div>
	</main>
</body>
</html>
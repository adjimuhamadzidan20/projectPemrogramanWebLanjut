<?php 	
	// koneksi
	require 'config/koneksi_db.php';

	// show data
	$show = "SELECT * FROM dt_jadwal_latihan 
	INNER JOIN dt_pelatih ON dt_jadwal_latihan.ID_pelatih = dt_pelatih.ID_pelatih 
	INNER JOIN dt_cabang ON dt_jadwal_latihan.ID_cabang = dt_cabang.ID_cabang";

	$showData = mysqli_query($koneksi, $show);

	// memasukan data
	if (isset($_POST['simpan'])) {
		$hari_latihan = $_POST['hari_lat'];
		$pelatih = $_POST['pelatih'];
		$cabang = $_POST['cabang'];

		$query = "INSERT INTO dt_jadwal_latihan VALUES ('', '$hari_latihan', '$pelatih', '$cabang')";

		mysqli_query($koneksi, $query);

		echo "<meta http-equiv=refresh content=0.0;URL=jadwal.php>";

		// pop up
		echo "<script>alert('Data berhasil ditambahkan!');</script>";
	}

	// menghapus data
	if (isset($_GET['delete'])) {
		$query = "DELETE FROM dt_jadwal_latihan WHERE ID_latihan = $_GET[delete]";

		mysqli_query($koneksi, $query);

		// refresh halaman
		echo "<meta http-equiv=refresh content=0.0;URL=jadwal.php>";

		// pop up
		echo "<script>alert('Data berhasil terhapus!');</script>";
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


		main .container .simpan {
			cursor: pointer;
			padding: 4px 2px;
			box-sizing: border-box;
			width: 70px;
			margin-top: 15px;
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

		.form form #hari_latihan {
			margin-top: 4px;
			margin-bottom: 12px;
			width: 220px;
			height: 20px;
			padding: 2px;
		}

		.form form #cabang, #pelatih {
			margin-top: 4px;
			/*margin-bottom: 5px;*/
			width: 220px;
			height: 20px;
			padding: 2px;
		}

		.form form a {
			color: white;
			font-size: 12px;	
			margin-bottom: 10px;
		}

		.form form a:hover {
			color: lightgrey;
		}

		.form form .idcabang {
			margin-top: 12px;
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
			<div class="form">
				<div class="title-jadwal">
					<h1>Input Jadwal<br>Latihan</h1>
					<p>Menambahkan data jadwal latihan</p>
				</div>
				<form action="jadwal.php" method="post">
					<label for="hari_latihan">Hari Latihan</label><br>
					<input type="text" id="hari_latihan" name="hari_lat" required><br>
					<label for="pelatih">ID Pelatih</label><br>
					<input type="text" id="pelatih" name="pelatih" required><br>
					<a href="pelatih.php">*lihat data pelatih</a><br>
					<div class="idcabang">
						<label for="cabang">ID Cabang</label><br>
						<input type="text" id="cabang" name="cabang" required><br>
						<a href="cabang.php">*lihat data cabang</a><br>
					</div>
					<button type="submit" name="simpan" class="simpan">Simpan</button>
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
						<th>Opsi</th>
					</tr>
					<?php while($data = mysqli_fetch_assoc($showData)) : ?>
						<tr>
							<td><?= $data['ID_latihan'];?></td>
							<td><?= $data['Hari'];?></td>
							<td><?= $data['Nama_pelatih'];?></td>
							<td><?= $data['ID_pelatih'];?></td>
							<td><?= $data['Nama_cabang'];?></td>
							<td><?= $data['ID_cabang'];?></td>
							<td>
								<a href="edit_dt_jadwal.php?update=<?= $data['ID_latihan'];?>"><button type="button" class="edit">Edit</button></a>
								<a href="?delete=<?= $data['ID_latihan'];?>"><button type="button" onclick=" return confirm('Yakin ingin menghapus?')" class="hapus">Hapus</button></a>
							</td>
						</tr>
					<?php endwhile; ?>
				</table>
				<footer>
					<?php require 'modularitas/footer.php' ?>
				</footer>
			</div>
		</div>
	</main>
</body>
</html>
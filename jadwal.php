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

	// mencari data
	if (isset($_POST['btn_cari'])) {
		$input_search = $_POST['keyword_cari'];

		$query = "SELECT * FROM dt_jadwal_latihan 
		INNER JOIN dt_pelatih ON dt_jadwal_latihan.ID_pelatih = dt_pelatih.ID_pelatih 
		INNER JOIN dt_cabang ON dt_jadwal_latihan.ID_cabang = dt_cabang.ID_cabang WHERE 
		dt_jadwal_latihan.ID_latihan LIKE '%$input_search%' OR dt_jadwal_latihan.Hari LIKE '%$input_search%' 
		OR dt_pelatih.Nama_pelatih LIKE '%$input_search%' OR dt_pelatih.ID_pelatih LIKE '%$input_search%' 
		OR dt_cabang.Nama_cabang LIKE '%$input_search%' OR dt_cabang.ID_cabang LIKE '%$input_search%'";

		$showData = mysqli_query($koneksi, $query);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jadwal Latihan</title>
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

		main .container button {
			cursor: pointer;
			padding: 6px 2px;
			box-sizing: border-box;
			width: 70px;
			border: none;
		}

		main .container button:hover {
			background-color: #dfe4ea;
		}

		.form {
			background-color: #2c2c54;
			width: 25%;
			color: white;
			padding: 40px 20px;
			box-shadow: 5px 0 4px lightgrey;
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
			width: 260px;
			height: 20px;
			padding: 2px;
		}

		.form form #cabang, #pelatih {
			margin-top: 4px;
			/*margin-bottom: 5px;*/
			width: 260px;
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

		.form .kembali {
			position: absolute;
			bottom: 0;
			padding: 15px 0;
		}

		.form form #simpan {
			cursor: pointer;
			padding: 7px 2px;
			box-sizing: border-box;
			width: 268px;
			margin-top: 10px;
		}

		.form form #simpan:hover {
			background-color: #dfe4ea;
			transition: 0.1s;
		}

		.tabel-data {
			width: 75%;
			padding: 40px 20px;
		}

		.tabel-data table {
			margin-top: 12px;
			width: 100%;
			background-color: #F9F9F9;
			border: none;
			text-align: center;
			font-size: 14px;
		}

		.tabel-data table th {
			background-color: #2c2c54;
			color: white;
		}

		.tabel-data table tr th, td {
			padding: 6px 10px;
		}

		.tabel-data .header {
			display: flex;
			justify-content: space-between;
		}

		.header .search input {
			height: 25px;
			padding: 0 5px;
		}

		.tabel-data #laporan {
			cursor: pointer;
			padding: 6px 2px;
			box-sizing: border-box;
			width: 200px;
			border: 1px solid lightgrey;
		}

		#btn_cari, #edit, #hapus {
			border: 1px solid lightgrey;
		}

		.tabel-data #tabel_data {
			overflow-y: auto;
			height: 93%;
		}

	</style>
</head>
<body>
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
					<button type="submit" name="simpan" id="simpan"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
				</form>
				<div class="kembali">
					<?php require 'modularitas/btn_kembali.php'; ?>
				</div>
			</div>
			<div class="tabel-data">
				<div class="header">
					<h2>Jadwal Latihan</h2>
					<div class="search">
						<form action="" method="post">
							<input type="search" placeholder="Search" name="keyword_cari" id="keyword_cari">
							<button type="submit" name="btn_cari" id="btn_cari"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
						</form>
					</div>
				</div><br>
				<a href="laporan_jadwal.php"><button type="button" id="laporan">Laporan Jadwal</button></a>
				<div id="tabel_data">
					<table border="0" cellspacing="0">
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
									<center>
										<a href="edit_dt_jadwal.php?update=<?= $data['ID_latihan'];?>"><button type="button" id="edit"><i class="fa-solid fa-file-pen"></i> Edit</button></a>
										<a href="hapus_jadwal.php?delete=<?= $data['ID_latihan'];?>"><button type="button" onclick=" return confirm('Yakin ingin menghapus?')" id="hapus"><i class="fa-solid fa-trash-can"></i> Hapus</button></a>
									</center>
								</td>
							</tr>
						<?php endwhile; ?>
					</table>
				</div>
				<footer>
					<?php require 'modularitas/footer.php' ?>
				</footer>
			</div>
		</div>
	</main>

	<script type="text/javascript" src="js/jadwal.js"></script>
	<script type="text/javascript" src="fontawesome/js/all.min.js"></script>
</body>
</html>
<?php 
	// koneksi
	require 'config/koneksi_db.php';

	session_start();
	if (!isset($_SESSION['login_admin'])) {
		header('Location: login.php');
		exit;
	}

	// show data
	$show = "SELECT * FROM dt_cabang";
	$showData = mysqli_query($koneksi, $show);

	// memasukan data
	if (isset($_POST['simpan'])) {
		$cabang = $_POST['nama_cabang'];
		$pj = $_POST['PJ'];
		$jmlanggota = $_POST['jumlah_anggota'];

		$query = "INSERT INTO dt_cabang VALUES ('', '$cabang', '$pj', '$jmlanggota')";

		mysqli_query($koneksi, $query);

		echo "<meta http-equiv=refresh content=0.0;URL=cabang.php>";

		// pop up
		echo "<script>alert('Data berhasil ditambahkan!');</script>";
	}

	// mencari data
	if (isset($_POST['btn_cari'])) {
		$input_search = $_POST['keyword_cari'];

		$query = "SELECT * FROM dt_cabang WHERE ID_cabang LIKE '%$input_search%' OR Nama_cabang LIKE '%$input_search%'
		OR Penanggung_jawab LIKE '%$input_search%' OR Jumlah_anggota LIKE '%$input_search%'";

		$showData = mysqli_query($koneksi, $query);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cabang</title>
	<link rel="stylesheet" href="fontawesome/css/all.min.css">
	<!-- css data cabang -->
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

		.form .title-cabang {
			margin-bottom: 36px;
		}

		.form .title-cabang p {
			margin-top: 2px;
			font-size: 14px;
		}

		.form form input {
			margin-top: 4px;
			margin-bottom: 12px;
			width: 260px;
			height: 20px;
			padding: 2px;
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
				<div class="title-cabang">
					<h1>Input Cabang</h1>
					<p>Menambahkan data cabang</p>
				</div>
				<form action="cabang.php" method="post">
					<label for="nama">Nama Cabang</label><br>
					<input type="text" id="nama" name="nama_cabang" required><br>
					<label for="pj">Penanggung Jawab</label><br>
					<input type="text" id="pj" name="PJ" required><br>
					<label for="anggota">Jumlah Anggota</label><br>
					<input type="text" id="anggota" name="jumlah_anggota" required><br>
					<button type="submit" name="simpan" id="simpan"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
				</form>
				<div class="kembali">
					<?php require 'modularitas/btn_kembali.php'; ?>
				</div>
			</div>
			<div class="tabel-data">
				<div class="header">
					<h2>Data Cabang</h2>
					<div class="search">
						<form action="" method="post">
							<input type="search" placeholder="Search" name="keyword_cari" id="keyword_cari">
							<button type="submit" name="btn_cari" id="btn_cari"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
						</form>
					</div>
				</div>
				<div id="tabel_data">
					<table border="0" cellspacing="0">
						<tr>
							<th>ID Cabang</th>
							<th>Nama Cabang</th>
							<th>Penanggung Jawab</th>
							<th>Jumlah Anggota</th>
							<th>Opsi</th>
						</tr>
						<?php while($data = mysqli_fetch_assoc($showData)) : ?>
							<tr>
								<td><?= $data['ID_cabang'];?></td>
								<td><?= $data['Nama_cabang'];?></td>
								<td><?= $data['Penanggung_jawab'];?></td>
								<td><?= $data['Jumlah_anggota'];?></td>
								<td>
									<center>
										<a href="edit_dt_cabang.php?update=<?= $data['ID_cabang'];?>"><button type="button" id="edit"><i class="fa-solid fa-file-pen"></i> Edit</button></a>
										<a href="hapus_cabang.php?delete=<?= $data['ID_cabang'];?>"><button type="button" onclick=" return confirm('Yakin ingin menghapus?')" id="hapus"><i class="fa-solid fa-trash-can"></i> Hapus</button></a>
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

	<script type="text/javascript" src="js/cabang.js"></script>
	<script type="text/javascript" src="fontawesome/js/all.min.js"></script>
</body>
</html>
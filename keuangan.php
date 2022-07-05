<?php 	
	// koneksi
	require 'config/koneksi_db.php';

	// show data
	$show = "SELECT * FROM dt_keuangan INNER JOIN dt_anggota ON dt_keuangan.ID_anggota = dt_anggota.ID_anggota";
	$showData = mysqli_query($koneksi, $show);

	// memasukan data
	if (isset($_POST['simpan'])) {
		$tgl_bayar = $_POST['pembayaran'];
		$nominal = $_POST['nominal'];
		$keterangan = $_POST['ket'];
		$id_anggota = $_POST['id_anggota'];

		$query = "INSERT INTO dt_keuangan VALUES ('', '$tgl_bayar', '$nominal', '$keterangan', '$id_anggota')";

		$data = mysqli_query($koneksi, $query);
		
		echo "<meta http-equiv=refresh content=0.0;URL=keuangan.php>";

		// pop up
		echo "<script>alert('Data berhasil ditambahkan!');</script>";	
		
	}

	// mencari data
	if (isset($_POST['btn_cari'])) {
		$input_search = $_POST['keyword_cari'];

		$query = "SELECT * FROM dt_keuangan 
		INNER JOIN dt_anggota ON dt_keuangan.ID_anggota = dt_anggota.ID_anggota WHERE 
		dt_keuangan.ID_keuangan LIKE '%$input_search%' OR dt_keuangan.Tanggal_Pembayaran LIKE '%$input_search%' 
		OR dt_keuangan.Nominal LIKE '%$input_search%' OR dt_keuangan.Keterangan LIKE '%$input_search%' 
		OR dt_anggota.Nama_lengkap LIKE '%$input_search%' OR dt_anggota.ID_anggota LIKE '%$input_search%'";

		$showData = mysqli_query($koneksi, $query);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Keuangan</title>
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

		.form .title-keuangan {
			margin-bottom: 36px;
		}

		.form .title-keuangan p {
			margin-top: 2px;
			font-size: 14px;
		}

		.form form #pembayaran, #nominal, #ket {
			margin-top: 4px;
			margin-bottom: 12px;
			width: 260px;
			height: 20px;
			padding: 2px;
		}

		.form form #id_anggota {
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
			padding: 6px 8px;
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
				<div class="title-keuangan">
					<h1>Input Keuangan</h1>
					<p>Menambahkan data keuangan</p>
				</div>
				<form action="keuangan.php" method="post">
					<label for="pembayaran">Tanggal Pembayaran</label><br>
					<input type="date" id="pembayaran" name="pembayaran"><br>
					<label for="nominal">Nominal</label><br>
					<input type="text" id="nominal" name="nominal" required><br>
					<label for="ket">Keterangan</label><br>
					<input type="text" id="ket" name="ket" required><br>
					<label for="id_anggota">ID Anggota</label><br>
					<input type="text" id="id_anggota" name="id_anggota" required><br>
					<a href="anggota.php">*lihat data anggota</a><br>
					<button type="submit" name="simpan" id="simpan"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
				</form>
				<div class="kembali">
					<?php require 'modularitas/btn_kembali.php'; ?>
				</div>
			</div>
			<div class="tabel-data">
				<div class="header">
					<h2>Data Keuangan</h2>
					<div class="search">
						<form action="" method="post">
							<input type="search" placeholder="Search" name="keyword_cari" id="keyword_cari">
							<button type="submit" name="btn_cari" id="btn_cari"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
						</form>
					</div>
				</div><br>
				<a href="laporan_keuangan.php"><button type="button" id="laporan">Laporan Keuangan</button></a>
				<div id="tabel_data">
					<table border="0" cellspacing="0">
						<tr>
							<th>ID Keuangan</th>
							<th>Tanggal Pembayaran</th>
							<th>Nominal</th>
							<th>Keterangan</th>
							<th>Nama Anggota</th>
							<th>ID Anggota</th>
							<th>Opsi</th>
						</tr>
						<?php while($data = mysqli_fetch_assoc($showData)) : ?>
							<tr>
								<td><?= $data['ID_keuangan'];?></td>
								<td><?= $data['Tanggal_Pembayaran'];?></td>
								<td><?= $data['Nominal'];?></td>
								<td><?= $data['Keterangan'];?></td>
								<td><?= $data['Nama_lengkap'];?></td>
								<td><?= $data['ID_anggota'];?></td>
								<td>
									<center>
										<a href="edit_dt_keuangan.php?update=<?= $data['ID_keuangan'];?>"><button type="button" id="edit"><i class="fa-solid fa-file-pen"></i> Edit</button></a>
										<a href="hapus_keuangan.php?delete=<?= $data['ID_keuangan'];?>"><button type="button" onclick=" return confirm('Yakin ingin menghapus?')" id="hapus"><i class="fa-solid fa-trash-can"></i> Hapus</button></a>
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

	<script type="text/javascript" src="js/keuangan.js"></script>
	<script type="text/javascript" src="fontawesome/js/all.min.js"></script>
</body>
</html>
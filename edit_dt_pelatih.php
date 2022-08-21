<?php  
	// koneksi
	require 'config/koneksi_db.php';

	session_start();
	if (!isset($_SESSION['login_admin'])) {
		header('Location: login.php');
		exit;
	}

	// menampilkan data
	// $show = "SELECT * FROM dt_anggota";
	// $showData = mysqli_query($koneksi, $show);
	// $result = mysqli_fetch_assoc($showData);

	// merubah data
	$sql = "SELECT * FROM dt_pelatih WHERE ID_pelatih = $_GET[update]";
	$data = mysqli_query($koneksi, $sql);
	$hasil = mysqli_fetch_assoc($data);

	if (isset($_POST['edit_data'])) {
		$idpelatih = $_GET['update'];
		$pelatih = $_POST['nama_pelatih'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$gender = $_POST['jenis_kelamin'];
		$sabuk = $_POST['sabuk'];

		$query = "UPDATE dt_pelatih SET Nama_pelatih = '$pelatih', Tanggal_lahir = '$tgl_lahir', Jenis_kelamin = '$gender',
		Sabuk = '$sabuk' WHERE ID_pelatih = '$idpelatih'";

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
	<title>Pelatih</title>
	<link rel="stylesheet" href="fontawesome/css/all.min.css">
	<!-- css data pelatih -->
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
			width: 268px;
			border: none;
			margin-top: 16px;
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

		.form .title-pelatih {
			margin-bottom: 36px;
		}

		.form .title-pelatih p {
			margin-top: 2px;
			font-size: 14px;
		}

		.form form input, select {
			margin-top: 4px;
			margin-bottom: 12px;
			width: 260px;
			height: 20px;
			padding: 2px;
		}

		.form form select {
			height: 28px;
			width: 268px;
			cursor: pointer;
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

	</style>
</head>
<body>
	<main>
		<div class="container">
			<div class="form">
				<div class="title-pelatih">
					<h1>Edit Pelatih</h1>
					<p>Mengupdate data pelatih</p>
				</div>
				<form action="" method="post">
					<label for="id_pelatih">ID Pelatih</label><br>
					<input type="text" id="id_pelatih" name="id_pelatih" value="<?= $hasil['ID_pelatih'];?>" disabled><br>
					<label for="nama">Nama Pelatih</label><br>
					<input type="text" id="nama" name="nama_pelatih" value="<?= $hasil['Nama_pelatih'];?>"><br>
					<label for="tgl_lahir">Tanggal Lahir</label><br>
					<input type="date" id="tgl_lahir" name="tgl_lahir" value="<?= $hasil['Tanggal_lahir'];?>"><br>
					<label for="gender">Jenis Kelamin</label><br>
					<select id="gender" name="jenis_kelamin" value="<?= $hasil['Jenis_kelamin'];?>">
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select><br>
					<label for="sabuk">Sabuk</label><br>
					<select id="sabuk" name="sabuk" value="<?= $hasil['Sabuk'];?>">
						<option value="Putih">Putih</option>
						<option value="Hijau">Hijau</option>
						<option value="Orange">Orange</option>
						<option value="Biru">Biru</option>
						<option value="Merah">Merah</option>
						<option value="Coklat">Coklat</option>
						<option value="Hijau">Hitam</option>
					</select><br>
					<button type="submit" name="edit_data" onclick="return confirm('Update data?');"><i class="fa-solid fa-file-pen"></i> Edit Data</button>
					<a href="pelatih.php">
						<button type="button"><i class="fa-solid fa-arrow-left"></i> Kembali</button>
					</a>
				</form>
			</div>
			<div class="tabel-data">
				<h2>Data Pelatih</h2>
				<table border="0" cellspacing="0">
					<tr>
						<th>ID Pelatih</th>
						<th>Nama Pelatih</th>
						<th>Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Sabuk</th>
					</tr>
					<tr>
						<td><?= $hasil['ID_pelatih'];?></td>
						<td><?= $hasil['Nama_pelatih'];?></td>
						<td><?= $hasil['Tanggal_lahir'];?></td>
						<td><?= $hasil['Jenis_kelamin'];?></td>
						<td><?= $hasil['Sabuk'];?></td>
					</tr>
				</table>
				<footer>
					<?php require 'modularitas/footer.php' ?>
				</footer>
			</div>
		</div>
	</main>

	<script type="text/javascript" src="fontawesome/js/all.min.js"></script>
</body>
</html>
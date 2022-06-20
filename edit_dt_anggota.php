<?php  
	// koneksi
	require 'config/koneksi_db.php';

	// menampilkan data
	// $show = "SELECT * FROM dt_anggota";
	// $showData = mysqli_query($koneksi, $show);
	// $result = mysqli_fetch_assoc($showData);

	// merubah data
	$sql = "SELECT * FROM dt_anggota WHERE ID_anggota = $_GET[update]";
	$data = mysqli_query($koneksi, $sql);
	$hasil = mysqli_fetch_assoc($data);

	if (isset($_POST['edit_data'])) {
		$idanggota = $_GET['update'];
		$nama = $_POST['nama_lengkap'];
		$gender = $_POST['jenis_kelamin'];
		$alamat = $_POST['alamat'];
		$sabuk = $_POST['sabuk'];

		$query = "UPDATE dt_anggota SET Nama_lengkap = '$nama', Jenis_kelamin = '$gender', Alamat = '$alamat', Sabuk = '$sabuk'
		WHERE ID_anggota = '$idanggota'";

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
	<title>Anggota</title>
	<!-- css anggota -->
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
			width: 228px;
			margin-bottom: 10px;
		}

		.form {
			background-color: #2c3e50;
			width: 25%;
			color: white;
			padding: 35px 20px;
		}

		.form .title-anggota {
			margin-bottom: 36px;
		}

		.form .title-anggota p {
			margin-top: 2px;
			font-size: 14px;
		}

		.form form input, select {
			margin-top: 4px;
			margin-bottom: 10px;
			width: 220px;
			height: 20px;
			padding: 2px;
		}

		.form form select {
			height: 28px;
			width: 228px;
			cursor: pointer;
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
				<div class="title-anggota">
					<h1>Edit Anggota</h1>
					<p>Mengupdate data anggota</p>
				</div>
				<form action="" method="post">
					<label for="id_anggota">ID Anggota</label><br>
					<input type="text" id="id_anggota" name="id_anggota" value="<?= $hasil['ID_anggota'];?>" disabled><br>
					<label for="nama">Nama Lengkap</label><br>
					<input type="text" id="nama" name="nama_lengkap" value="<?= $hasil['Nama_lengkap'];?>"><br>
					<label for="gender">Jenis Kelamin</label><br>
					<select id="gender" name="jenis_kelamin" value="<?= $hasil['Jenis_kelamin'];?>">
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select><br>
					<label for="alamat">Alamat</label><br>
					<input type="text" id="alamat" name="alamat" value="<?= $hasil['Alamat'];?>"><br>
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

					<button type="submit" name="edit_data" onclick="return confirm('Update data?');">Edit Data</button>
					<a href="anggota.php">
						<button type="button">Kembali</button>
					</a>
				</form>
			</div>
			<div class="tabel-data">
				<h2>Data Anggota</h2>
				<table border="1" cellspacing="0">
					<tr>
						<th>ID Anggota</th>
						<th>Nama Lengkap</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Sabuk</th>
					</tr>
					<tr>
						<td><?= $hasil['ID_anggota'];?></td>
						<td><?= $hasil['Nama_lengkap'];?></td>
						<td><?= $hasil['Jenis_kelamin'];?></td>
						<td><?= $hasil['Alamat'];?></td>
						<td><?= $hasil['Sabuk'];?></td>
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
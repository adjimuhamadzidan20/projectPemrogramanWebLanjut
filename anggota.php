<?php 
	// koneksi
	require 'config/koneksi_db.php';

	// menampilkan data
	$show = "SELECT * FROM dt_anggota";
	$showData = mysqli_query($koneksi, $show);

	// memasukan data
	if (isset($_POST['simpan'])) {
		$nama = $_POST['nama_lengkap'];
		$gender = $_POST['jenis_kelamin'];
		$alamat = $_POST['alamat'];
		$sabuk = $_POST['sabuk'];

		$query = "INSERT INTO dt_anggota VALUES ('', '$nama', '$gender', '$alamat', '$sabuk')";

		mysqli_query($koneksi, $query);

		// refresh halaman
		echo "<meta http-equiv=refresh content=0.0;URL=anggota.php>";

		// pop up
		echo "<script>alert('Data berhasil ditambahkan!');</script>";
	}

	// menghapus data
	if (isset($_GET['delete'])) {
		$query = "DELETE FROM dt_anggota WHERE ID_anggota = $_GET[delete]";

		mysqli_query($koneksi, $query);

		// refresh halaman
		echo "<meta http-equiv=refresh content=0.0;URL=anggota.php>";

		// pop up
		echo "<script>alert('Data berhasil terhapus!');</script>";
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
			box-sizing: border-box;
			width: 70px;
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
			margin-bottom: 12px;
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
					<h1>Input Anggota</h1>
					<p>Menambahkan data anggota</p>
				</div>
				<form action="anggota.php" method="post">
					<label for="nama">Nama Lengkap</label><br>
					<input type="text" id="nama" name="nama_lengkap" required><br>
					<label for="gender">Jenis Kelamin</label><br>
					<select id="gender" name="jenis_kelamin">
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select><br>
					<label for="alamat">Alamat</label><br>
					<input type="text" id="alamat" name="alamat" required><br>
					<label for="sabuk">Sabuk</label><br>
					<select id="sabuk" name="sabuk">
						<option value="Putih">Putih</option>
						<option value="Hijau">Hijau</option>
						<option value="Orange">Orange</option>
						<option value="Biru">Biru</option>
						<option value="Merah">Merah</option>
						<option value="Coklat">Coklat</option>
						<option value="Hijau">Hitam</option>
					</select><br>
					<button type="submit" name="simpan">Simpan</button>
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
						<th>Opsi</th>
					</tr>
					<?php while($data = mysqli_fetch_assoc($showData)) : ?>
						<tr>
							<td><?= $data['ID_anggota'];?></td>
							<td><?= $data['Nama_lengkap'];?></td>
							<td><?= $data['Jenis_kelamin'];?></td>
							<td><?= $data['Alamat'];?></td>
							<td><?= $data['Sabuk'];?></td>
							<td>
								<a href="edit_dt_anggota.php?update=<?= $data['ID_anggota'];?>"><button type="button">Edit</button></a>
								<a href="?delete=<?= $data['ID_anggota'];?>"><button type="button" onclick=" return confirm('Yakin ingin menghapus?')">Hapus</button></a>
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
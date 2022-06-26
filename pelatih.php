<?php 
	// koneksi
	require 'config/koneksi_db.php';

	// show data
	$show = "SELECT * FROM dt_pelatih";
	$showData = mysqli_query($koneksi, $show);

	// memasukan data
	if (isset($_POST['simpan'])) {
		$pelatih = $_POST['nama_pelatih'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$gender = $_POST['jenis_kelamin'];
		$sabuk = $_POST['sabuk'];

		$query = "INSERT INTO dt_pelatih VALUES ('', '$pelatih', '$tgl_lahir', '$gender', '$sabuk')";

		mysqli_query($koneksi, $query);

		echo "<meta http-equiv=refresh content=0.0;URL=pelatih.php>";

		// pop up
		echo "<script>alert('Data berhasil ditambahkan!');</script>";
	}

	// menghapus data
	if (isset($_GET['delete'])) {
		$query = "DELETE FROM dt_pelatih WHERE ID_pelatih = $_GET[delete]";

		mysqli_query($koneksi, $query);

		// refresh halaman
		echo "<meta http-equiv=refresh content=0.0;URL=pelatih.php>";

		// pop up
		echo "<script>alert('Data berhasil terhapus!');</script>";
	}

	// mencari data
	if (isset($_POST['btn_cari'])) {
		$input_search = $_POST['keyword_cari'];

		$query = "SELECT * FROM dt_pelatih WHERE ID_pelatih LIKE '%$input_search%' OR Nama_pelatih LIKE '%$input_search%'
		OR Tanggal_lahir LIKE '%$input_search%' OR Jenis_kelamin LIKE '%$input_search%' OR Sabuk LIKE '%$input_search%'";

		$showData = mysqli_query($koneksi, $query);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pelatih</title>
	<!-- css data pelatih -->
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
			padding: 40px 20px;
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
			width: 100%;
		}

		.tabel-data table tr th, td {
			padding: 5px 10px;
		}

		.tabel-data .header {
			display: flex;
			justify-content: space-between;
		}

		.header .search input {
			height: 25px;
			padding: 0 5px;
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
				<div class="title-pelatih">
					<h1>Input Pelatih</h1>
					<p>Menambahkan data pelatih</p>
				</div>
				<form action="pelatih.php" method="post">
					<label for="nama">Nama Pelatih</label><br>
					<input type="text" id="nama" name="nama_pelatih" required><br>
					<label for="tgl_lahir">Tanggal Lahir</label><br>
					<input type="date" id="tgl_lahir" name="tgl_lahir"><br>
					<label for="gender">Jenis Kelamin</label><br>
					<select id="gender" name="jenis_kelamin">
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select><br>
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
				<div class="header">
					<h2>Data Pelatih</h2>
					<div class="search">
						<form action="" method="post">
							<input type="search" placeholder="Search" name="keyword_cari" id="keyword_cari">
							<button type="submit" name="btn_cari" id="btn_cari">Cari</button>
						</form>
					</div>
				</div>
				<div id="tabel_data">
					<table border="1" cellspacing="0">
						<tr>
							<th>ID Pelatih</th>
							<th>Nama Pelatih</th>
							<th>Tanggal Lahir</th>
							<th>Jenis Kelamin</th>
							<th>Sabuk</th>
							<th>Opsi</th>
						</tr>
						<?php while($data = mysqli_fetch_assoc($showData)) : ?>
							<tr>
								<td><?= $data['ID_pelatih'];?></td>
								<td><?= $data['Nama_pelatih'];?></td>
								<td><?= $data['Tanggal_lahir'];?></td>
								<td><?= $data['Jenis_kelamin'];?></td>
								<td><?= $data['Sabuk'];?></td>
								<td>
									<center>
										<a href="edit_dt_pelatih.php?update=<?= $data['ID_pelatih'];?>"><button type="button">Edit</button></a>
										<a href="?delete=<?= $data['ID_pelatih'];?>"><button type="button" onclick=" return confirm('Yakin ingin menghapus?')">Hapus</button></a>
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

	<script type="text/javascript" src="js/pelatih.js"></script>
</body>
</html>
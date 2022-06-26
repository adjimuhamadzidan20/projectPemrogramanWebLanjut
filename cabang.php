<?php 
	// koneksi
	require 'config/koneksi_db.php';

	// show data
	$show = "SELECT * FROM dt_cabang";
	$showData = mysqli_query($koneksi, $show);

	// memasukan data
	if (isset($_POST['simpan'])) {
		$cabang = $_POST['nama_cabang'];
		$pj = $_POST['PJ'];
		$jmlnggota = $_POST['jumlah_anggota'];

		$query = "INSERT INTO dt_cabang VALUES ('', '$cabang', '$pj', '$jmlanggota')";

		mysqli_query($koneksi, $query);

		echo "<meta http-equiv=refresh content=0.0;URL=cabang.php>";

		// pop up
		echo "<script>alert('Data berhasil ditambahkan!');</script>";
	}

	// menghapus data
	if (isset($_GET['delete'])) {
		$query = "DELETE FROM dt_cabang WHERE ID_cabang = $_GET[delete]";

		mysqli_query($koneksi, $query);

		// refresh halaman
		echo "<meta http-equiv=refresh content=0.0;URL=cabang.php>";

		// pop up
		echo "<script>alert('Data berhasil terhapus!');</script>";
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
	<!-- css data cabang -->
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
					<button type="submit" name="simpan">Simpan</button>
				</form>
			</div>
			<div class="tabel-data">
				<div class="header">
					<h2>Data Cabang</h2>
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
										<a href="edit_dt_cabang.php?update=<?= $data['ID_cabang'];?>"><button type="button">Edit</button></a>
										<a href="?delete=<?= $data['ID_cabang'];?>"><button type="button" onclick=" return confirm('Yakin ingin menghapus?')">Hapus</button></a>
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
</body>
</html>
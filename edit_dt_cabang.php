<?php  
	// koneksi
	require 'config/koneksi_db.php';

	// menampilkan data
	// $show = "SELECT * FROM dt_anggota";
	// $showData = mysqli_query($koneksi, $show);
	// $result = mysqli_fetch_assoc($showData);

	// merubah data
	$sql = "SELECT * FROM dt_cabang WHERE ID_cabang = $_GET[update]";
	$data = mysqli_query($koneksi, $sql);
	$hasil = mysqli_fetch_assoc($data);

	if (isset($_POST['edit_data'])) {
		$idcabang = $_GET['update'];
		$cabang = $_POST['nama_cabang'];
		$pj = $_POST['PJ'];
		$jmlanggota = $_POST['jumlah_anggota'];

		$query = "UPDATE dt_cabang SET Nama_cabang = '$cabang', Penanggung_jawab = '$pj', Jumlah_anggota = '$jmlanggota'
		WHERE ID_cabang = '$idcabang'";

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
			width: 228px;
			margin-bottom: 10px;
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
				<div class="title-cabang">
					<h1>Edit Cabang</h1>
					<p>Mengupdate data cabang</p>
				</div>
				<form action="" method="post">
					<label for="id_cabang">ID Cabang</label><br>
					<input type="text" id="id_cabang" name="id_cabang" value="<?= $hasil['ID_cabang'];?>" disabled><br>
					<label for="nama">Nama Cabang</label><br>
					<input type="text" id="nama" name="nama_cabang" value="<?= $hasil['Nama_cabang'];?>"><br>
					<label for="pj">Penanggung Jawab</label><br>
					<input type="text" id="pj" name="PJ" value="<?= $hasil['Penanggung_jawab'];?>"><br>
					<label for="anggota">Jumlah Anggota</label><br>
					<input type="text" id="anggota" name="jumlah_anggota" value="<?= $hasil['Jumlah_anggota'];?>"><br>
					<button type="submit" name="edit_data" onclick="return confirm('Update data?');">Edit Data</button>
					<a href="cabang.php">
						<button type="button">Kembali</button>
					</a>
				</form>
			</div>
			<div class="tabel-data">
				<h2>Data Cabang</h2>
				<table border="1" cellspacing="0">
					<tr>
						<th>ID Cabang</th>
						<th>Nama Cabang</th>
						<th>Penanggung Jawab</th>
						<th>Jumlah Anggota</th>
					</tr>
					<tr>
						<td><?= $hasil['ID_cabang'];?></td>
						<td><?= $hasil['Nama_cabang'];?></td>
						<td><?= $hasil['Penanggung_jawab'];?></td>
						<td><?= $hasil['Jumlah_anggota'];?></td>
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
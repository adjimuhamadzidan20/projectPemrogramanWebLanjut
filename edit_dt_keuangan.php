<?php  
	// koneksi
	require 'config/koneksi_db.php';

	// menampilkan data
	// $show = "SELECT * FROM dt_anggota";
	// $showData = mysqli_query($koneksi, $show);
	// $result = mysqli_fetch_assoc($showData);

	// merubah data
	$sql = "SELECT * FROM dt_keuangan INNER JOIN dt_anggota ON dt_keuangan.ID_anggota = dt_anggota.ID_anggota
	WHERE ID_keuangan = $_GET[update]";

	$data = mysqli_query($koneksi, $sql);
	$hasil = mysqli_fetch_assoc($data);

	if (isset($_POST['edit_data'])) {
		$idkeuangan = $_GET['update'];
		$tgl_bayar = $_POST['pembayaran'];
		$nominal = $_POST['nominal'];
		$keterangan = $_POST['ket'];

		$query = "UPDATE dt_keuangan SET Tanggal_Pembayaran = '$tgl_bayar', Nominal = '$nominal', Keterangan = '$keterangan'
		WHERE ID_keuangan = '$idkeuangan'";

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
	<title>Keuangan</title>
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

		.form .title-keuangan {
			margin-bottom: 36px;
		}

		.form .title-keuangan p {
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
			padding: 5px 8px;
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
				<div class="title-keuangan">
					<h1>Edit Keuangan</h1>
					<p>Mengupdate data keuangan</p>
				</div>
				<form action="" method="post">
					<label for="id_keuangan">ID Keuangan</label><br>
					<input type="text" id="id_keuangan" name="id_keuangan" value="<?= $hasil['ID_keuangan'];?>" disabled><br>
					<label for="pembayaran">Tanggal Pembayaran</label><br>
					<input type="date" id="pembayaran" name="pembayaran" value="<?= $hasil['Tanggal_Pembayaran'];?>"><br>
					<label for="nominal">Nominal</label><br>
					<input type="text" id="nominal" name="nominal" value="<?= $hasil['Nominal'];?>"><br>
					<label for="ket">Keterangan</label><br>
					<input type="text" id="ket" name="ket" value="<?= $hasil['Keterangan'];?>"><br>
					<label for="id_anggota">ID Anggota</label><br>
					<input type="text" id="id_anggota" name="id_anggota" value="<?= $hasil['ID_anggota'];?>" disabled><br>
					<button type="submit" name="edit_data" onclick="return confirm('Update data?');">Edit Data</button>
					<a href="keuangan.php">
						<button type="button">Kembali</button>
					</a>
				</form>
			</div>
			<div class="tabel-data">
				<h2>Data Keuangan</h2>
				<table border="1" cellspacing="0">
					<tr>
						<th>ID Keuangan</th>
						<th>Tanggal Pembayaran</th>
						<th>Nominal</th>
						<th>Keterangan</th>
						<th>Nama Anggota</th>
						<th>ID Anggota</th>
					</tr>
					<tr>
						<td><?= $hasil['ID_keuangan'];?></td>
						<td><?= $hasil['Tanggal_Pembayaran'];?></td>
						<td><?= $hasil['Nominal'];?></td>
						<td><?= $hasil['Keterangan'];?></td>
						<td><?= $hasil['Nama_lengkap'];?></td>
						<td><?= $hasil['ID_anggota'];?></td>
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
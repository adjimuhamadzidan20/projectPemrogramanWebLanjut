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

	// menghapus data
	if (isset($_GET['delete'])) {
		$query = "DELETE FROM dt_keuangan WHERE ID_keuangan = $_GET[delete]";

		mysqli_query($koneksi, $query);

		// refresh halaman
		echo "<meta http-equiv=refresh content=0.0;URL=keuangan.php>";

		// pop up
		echo "<script>alert('Data berhasil terhapus!');</script>";
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

		
		main .container .simpan {
			cursor: pointer;
			padding: 4px 2px;
			box-sizing: border-box;
			width: 70px;
			margin-top: 15px;
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

		.form form #pembayaran, #nominal, #ket {
			margin-top: 4px;
			margin-bottom: 12px;
			width: 220px;
			height: 20px;
			padding: 2px;
		}

		.form form #id_anggota {
			margin-top: 4px;
			/*margin-bottom: 5px;*/
			width: 220px;
			height: 20px;
			padding: 2px;
		}

		.form form a {
			color: white;
			font-size: 12px;
			
		}

		.form form a:hover {
			color: lightgrey;
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

		main .tabel-data table .edit, .hapus {
			cursor: pointer;
			padding: 4px 2px;
			box-sizing: border-box;
			width: 70px;
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
					<button type="submit" name="simpan" class="simpan">Simpan</button>
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
								<a href="edit_dt_keuangan.php?update=<?= $data['ID_keuangan'];?>"><button type="button" class="edit">Edit</button></a>
								<a href="?delete=<?= $data['ID_keuangan'];?>"><button type="button" onclick=" return confirm('Yakin ingin menghapus?')" class="hapus">Hapus</button></a>
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
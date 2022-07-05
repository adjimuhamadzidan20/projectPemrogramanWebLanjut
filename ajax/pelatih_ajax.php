<?php  
	require '../config/koneksi_db.php';

	$keyword = $_GET['keyword'];

	$query = "SELECT * FROM dt_pelatih WHERE ID_pelatih LIKE '%$keyword%' OR Nama_pelatih LIKE '%$keyword%'
	OR Tanggal_lahir LIKE '%$keyword%' OR Jenis_kelamin LIKE '%$keyword%' OR Sabuk LIKE '%$keyword%'";

	$showData = mysqli_query($koneksi, $query);

?>

	<table border="0" cellspacing="0">
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
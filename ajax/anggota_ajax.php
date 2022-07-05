<?php  
	require '../config/koneksi_db.php';

	$keyword = $_GET['keyword'];

	$query = "SELECT * FROM dt_anggota WHERE ID_anggota LIKE '%$keyword%' OR Nama_lengkap LIKE '%$keyword%'
	OR Jenis_kelamin LIKE '%$keyword%' OR Alamat LIKE '%$keyword%' OR Sabuk LIKE '%$keyword%'";

	$showData = mysqli_query($koneksi, $query);

?>

	<table border="0" cellspacing="0">
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
					<center>
						<a href="edit_dt_anggota.php?update=<?= $data['ID_anggota'];?>"><button type="button">Edit</button></a>
						<a href="?delete=<?= $data['ID_anggota'];?>"><button type="button" onclick=" return confirm('Yakin ingin menghapus?')">Hapus</button></a>
					</center>
				</td>
			</tr>
		<?php endwhile; ?>
	</table>
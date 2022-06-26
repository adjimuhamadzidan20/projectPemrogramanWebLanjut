<?php  
	require '../config/koneksi_db.php';

	$keyword = $_GET['keyword'];

	$query = "SELECT * FROM dt_cabang WHERE ID_cabang LIKE '%$keyword%' OR Nama_cabang LIKE '%$keyword%'
	OR Penanggung_jawab LIKE '%$keyword%' OR Jumlah_anggota LIKE '%$keyword%'";

	$showData = mysqli_query($koneksi, $query);

?>

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
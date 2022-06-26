<?php  
	require '../config/koneksi_db.php';

	$keyword = $_GET['keyword'];

	$query = "SELECT * FROM dt_jadwal_latihan 
	INNER JOIN dt_pelatih ON dt_jadwal_latihan.ID_pelatih = dt_pelatih.ID_pelatih 
	INNER JOIN dt_cabang ON dt_jadwal_latihan.ID_cabang = dt_cabang.ID_cabang WHERE 
	dt_jadwal_latihan.ID_latihan LIKE '%$keyword%' OR dt_jadwal_latihan.Hari LIKE '%$keyword%' 
	OR dt_pelatih.Nama_pelatih LIKE '%$keyword%' OR dt_pelatih.ID_pelatih LIKE '%$keyword%' 
	OR dt_cabang.Nama_cabang LIKE '%$keyword%' OR dt_cabang.ID_cabang LIKE '%$keyword%'";

	$showData = mysqli_query($koneksi, $query);

?>

	<table border="1" cellspacing="0">
		<tr>
			<th>ID Latihan</th>
			<th>Hari Latihan</th>
			<th>Nama Pelatih</th>
			<th>ID Pelatih</th>
			<th>Nama Cabang</th>
			<th>ID Cabang</th>
			<th>Opsi</th>
		</tr>
		<?php while($data = mysqli_fetch_assoc($showData)) : ?>
			<tr>
				<td><?= $data['ID_latihan'];?></td>
				<td><?= $data['Hari'];?></td>
				<td><?= $data['Nama_pelatih'];?></td>
				<td><?= $data['ID_pelatih'];?></td>
				<td><?= $data['Nama_cabang'];?></td>
				<td><?= $data['ID_cabang'];?></td>
				<td>
					<center>
						<a href="edit_dt_jadwal.php?update=<?= $data['ID_latihan'];?>"><button type="button" class="edit">Edit</button></a>
						<a href="?delete=<?= $data['ID_latihan'];?>"><button type="button" onclick=" return confirm('Yakin ingin menghapus?')" class="hapus">Hapus</button></a>
					</center>
				</td>
			</tr>
		<?php endwhile; ?>
	</table>
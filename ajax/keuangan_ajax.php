<?php  
	require '../config/koneksi_db.php';

	$keyword = $_GET['keyword'];

	$query = "SELECT * FROM dt_keuangan 
	INNER JOIN dt_anggota ON dt_keuangan.ID_anggota = dt_anggota.ID_anggota WHERE 
	dt_keuangan.ID_keuangan LIKE '%$keyword%' OR dt_keuangan.Tanggal_Pembayaran LIKE '%$keyword%' 
	OR dt_keuangan.Nominal LIKE '%$keyword%' OR dt_keuangan.Keterangan LIKE '%$keyword%' 
	OR dt_anggota.Nama_lengkap LIKE '%$keyword%' OR dt_anggota.ID_anggota LIKE '%$keyword%'";

	$showData = mysqli_query($koneksi, $query);

?>

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
					<center>
						<a href="edit_dt_keuangan.php?update=<?= $data['ID_keuangan'];?>"><button type="button" class="edit">Edit</button></a>
						<a href="?delete=<?= $data['ID_keuangan'];?>"><button type="button" onclick=" return confirm('Yakin ingin menghapus?')" class="hapus">Hapus</button></a>
					</center>
				</td>
			</tr>
		<?php endwhile; ?>
	</table>
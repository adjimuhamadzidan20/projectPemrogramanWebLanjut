<?php 
	require 'config/koneksi_db.php';
	require 'fungsi_opsi/fungsi_opsi.php';

	// menghapus data
	$hapus = $_GET['delete'];

	if (hapusCabang($hapus) > 0) {
		// pop up
		echo "<script>alert('Data berhasil terhapus!');
		document.location.href = 'cabang.php';
		</script>";

	}

	else {
		// pop up
		echo "<script>alert('Data gagal terhapus!');
		document.location.href = 'cabang.php';
		</script>";
	}

?>
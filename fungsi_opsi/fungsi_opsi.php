<?php 
	require 'config/koneksi_db.php';
	
	// dt anggota
	function hapusAnggota($data) {
		global $koneksi;

		$query = "DELETE FROM dt_anggota WHERE ID_anggota = $data";

		mysqli_query($koneksi, $query);

		return mysqli_affected_rows($koneksi);
	}

	// dt cabang
	function hapusCabang($data) {
		global $koneksi;

		$query = "DELETE FROM dt_cabang WHERE ID_cabang = $data";

		mysqli_query($koneksi, $query);

		return mysqli_affected_rows($koneksi);
	}

	// dt jadwal
	function hapusJadwal($data) {
		global $koneksi;

		$query = "DELETE FROM dt_jadwal_latihan WHERE ID_latihan = $data";

		mysqli_query($koneksi, $query);

		return mysqli_affected_rows($koneksi);
	}

	// keuangan
	function hapusKeuangan($data) {
		global $koneksi;

		$query = "DELETE FROM dt_keuangan WHERE ID_keuangan = $data";

		mysqli_query($koneksi, $query);

		return mysqli_affected_rows($koneksi);
	}

	// dt pelatih 
	function hapusPelatih($data) {
		global $koneksi;

		$query = "DELETE FROM dt_pelatih WHERE ID_pelatih = $data";

		mysqli_query($koneksi, $query);

		return mysqli_affected_rows($koneksi);
	}

?>
<?php
	session_start();

	$_SESSION['beranda'] = true;

	if (!isset($_SESSION['login_admin'])) {
		header('Location: login.php');
		exit;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" href="fontawesome/css/all.min.css">
	<style>
		* {
			margin: 0;
			padding: 0;
		}

		body {
			background-image: url(background/sports.webp);
			font-family: "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
		}
		
		.header {
			margin: 50px 0 30px 0;
			text-align: center;
		}

		.container .menu {
			/*background-color: lightgrey;*/
			display: flex;
			justify-content: space-evenly;
			width: 50%;
			margin: auto;
			flex-wrap: wrap;
		}

		.data-anggota, .data-cabang, .data-jadwal, 
		.data-keuangan, .data-pelatih, .profile {
			background-color: white;
			border: 1px solid lightgrey;
			width: 180px;
			/*height: 180px;*/
			text-align: center;
			font-size: 12px;
			padding: 18px 0 18px 0;
			box-sizing: border-box;
		}

		.data-anggota:hover {
			filter: brightness(0.9);
		} 

		.data-cabang:hover {
			filter: brightness(0.9);
		}

		.data-jadwal:hover {
			filter: brightness(0.9);
		}

		.data-keuangan:hover {
			filter: brightness(0.9);
		}

		.data-pelatih:hover {
			filter: brightness(0.9);
		} 

		.profile:hover {
			filter: brightness(0.9);
		}

		.data-keuangan, .data-pelatih, .profile {
			margin-top: 30px;
		}

		.container .menu h2 {
			margin-top: 12px;
		}

		.container .menu a {
			color: black;
			text-decoration: none;
		}

		.logout {
			text-align: center;
			margin-top: 30px;
		}

		.logout button {
			width: 100px;
			padding: 5px 0;
			border: 1px solid grey;
			cursor: pointer;
		}

		.logout button:hover {
			background-color: lightgrey;
		}

	</style>
</head>
<body>
	<div class="header">
		<h1>Perguruan Pencak Silat Satria Bangsa</h1>
	</div>
	<div class="container">
		<div class="menu">
			<a href="anggota.php">
				<div class="data-anggota">
					<img src="logo/id.png" alt="Anggota" title="Anggota" width="130">
					<h2>Data Anggota</h2>
				</div>
			</a>
			<a href="cabang.php">
				<div class="data-cabang">
					<img src="logo/entrepreneur.png" alt="Cabang" title="Cabang" width="130">
					<h2>Data Cabang</h2>
				</div>
			</a>
			<a href="jadwal.php">
				<div class="data-jadwal">
					<img src="logo/calendar.png" alt="Jadwal" title="Jadwal" width="130">
					<h2>Data Jadwal</h2>
				</div>
			</a>
			<a href="keuangan.php">
				<div class="data-keuangan">
					<img src="logo/accounts.png" alt="Keuangan" title="Keuangan" width="130">
					<h2>Data Keuangan</h2>
				</div>
			</a>
			<a href="pelatih.php">
				<div class="data-pelatih">
					<img src="logo/coach.png" alt="Pelatih" title="Pelatih" width="130">
					<h2>Data Pelatih</h2>
				</div>
			</a>
			<a href="profil.php">
				<div class="profile">
					<img src="logo/user.png" alt="Profil" title="Profil" width="130">
					<h2>Profil</h2>
				</div>
			</a>
		</div>
	</div>
	<div class="logout">
		<a href="logout.php"><button><i class="fas fa-sign-out-alt"></i> LOGOUT</button></a>
	</div>
</body>
</html>
<?php
	session_start();
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
	<title>Profil</title>
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

		.title {
			text-align: center;
			margin-top: 80px;
			margin-bottom: 30px;
		}

		.container .wrap {
			display: flex;
			justify-content: center;
		}

		.container .wrap .photo {
			display: flex;
			align-items: center;
		}

		.container .wrap .photo img {
			border-radius: 100%;
		}

		.container .profil {
			/*background-color: lightgrey;*/
			width: 28%;
			/*margin: auto;*/
			line-height: 23px;
		}

		.kembali button {
			cursor: pointer;
			padding: 6px 2px;
			box-sizing: border-box;
			width: 120px;
			border: 1px solid grey;
			margin-top: 40px;
		}

		.kembali button:hover {
			background-color: #dfe4ea;
			transition: 0.1s;
		}

	</style>
</head>
<body>
	<div class="title">
		<h1>Profile</h1>
	</div>
	<div class="container">
		<div class="wrap">
			<div class="profil">
				<div class="nama">
					<b><p>Nama Lengkap</p></b>
					<p>Adji Muhamad Zidan</p>
				</div><br>
				<div class="NPM">
					<b><p>NPM</p></b>
					<p>201943501940</p>
				</div><br>
				<div class="kelas">
					<b><p>Kelas</p></b>
					<p>R6X</p>
				</div><br>
				<div class="email">
					<b><p>Email</p></b>
					<p>adjimuhamadzidan@gmail.com</p>
				</div>
			</div>
			<div class="photo">
				<img src="profil/20211020_123954.jpg" alt="adjimuhamadzidan" title="Adji Muhamad Zidan" width="220">
			</div>
		</div>
		<div class="kembali">
			<center>
				<a href="beranda.php">
					<button type="button"><i class="fa-solid fa-arrow-left"></i> Kembali</button>
				</a>
			</center>	
		</div>
	</div>

	<script type="text/javascript" src="fontawesome/js/all.min.js"></script>
</body>
</html>
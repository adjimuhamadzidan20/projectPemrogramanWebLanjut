<?php
	session_start();

	if (isset($_SESSION['login_admin'])) {
		header('Location: beranda.php');
		exit;
	}

	// login
	if (isset($_POST['login'])) {
		$user = $_POST['username'];
		$pass = $_POST['password'];

		if ($user == 'admin' && $pass == 'admin') {
			$_SESSION['login_admin'] = true;

			header('Location: beranda.php');
			exit;
		} else {
			echo "<script>alert('Username atau password invalid!');</script>";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Admin</title>
	<link rel="stylesheet" href="fontawesome/css/all.min.css">
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			background-image: url(background/sports.webp);
			font-family: "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
		}

		.container {
			margin-top: 100px;
		}

		.form-login {
			background-color: #2c2c54;
			width: 35%;
			margin: auto;
			padding: 38px 60px;
			box-shadow: 5px 5px 4px lightgrey;
		}

		.username, .password {
			display: flex;
			flex-direction: column;
			margin-bottom: 10px;
			color: white;
		}

		h1 {
			text-align: center;
			margin-bottom: 30px;
			color: white;
			font-size: 30px;
		}

		input {
			padding: 5px;
			margin-top: 2px;
		}

		.btn-submit button {
			padding: 6px;
			width: 100%;
			cursor: pointer;
			margin-top: 10px;
		}

	</style>
</head>
<body>
	<div class="container">
		<div class="form-login">
			<h1>Login Admin</h1>
			<form method="post">
				<div class="username">
					<label for="user"><i class="fas fa-user fa-xs"></i> Username</label>
					<input type="text" placeholder="Username" name="username" id="user" required>
				</div>
				<div class="password">
					<label for="pass"><i class="fas fa-lock fa-xs"></i> Password</label>
					<input type="Password" placeholder="Password" name="password" id="pass" required>
				</div>
				<div class="btn-submit">
					<center>
						<button type="submit" name="login"><i class="fas fa-sign-in-alt"></i> LOGIN</button>
					</center>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
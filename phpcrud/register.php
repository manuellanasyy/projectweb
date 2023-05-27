<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
	header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('User Registration Completed!')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Something Wrong.')</script>";
			}
		} else {
			echo "<script>alert('Email Already Exists.')</script>";
		}
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>


<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Poppins', sans-serif;
	}

	body {
		display: flex;
		justify-content: center;
		align-items: center;
		min-height: 100vh;
		background: #191825;
	}

	.box {
		position: relative;
		width: 380px;
		height: 590px;
		background: #000000;
		border-radius: 8px;
		overflow: hidden;
	}

	.box::before {
		content: '';
		position: absolute;
		top: -50%;
		left: -50%;
		width: 380px;
		height: 420px;
		background: linear-gradient(0deg, transparent, transparent, #0F6292, #0F6292, #0F6292);
		z-index: 1;
		transform-origin: bottom right;
		animation: animate 6s linear infinite;
	}

	.box::after {
		content: '';
		position: absolute;
		top: -50%;
		left: -50%;
		width: 380px;
		height: 420px;
		background: linear-gradient(0deg, transparent, transparent, #0F6292, #0F6292, #0F6292);
		z-index: 1;
		transform-origin: bottom right;
		animation: animate 6s linear infinite;
		animation-delay: -3s;
	}

	.borderLine {
		position: absolute;
		top: 0;
		inset: 0;
	}

	.borderLine::before {
		content: '';
		position: absolute;
		top: -50%;
		left: -50%;
		width: 380px;
		height: 420px;
		background: linear-gradient(0deg, transparent, transparent, #E90064, #E90064, #E90064);
		z-index: 1;
		transform-origin: bottom right;
		animation: animate 6s linear infinite;
		animation-delay: -1.5s;
	}

	.borderLine::after {
		content: '';
		position: absolute;
		top: -50%;
		left: -50%;
		width: 380px;
		height: 420px;
		background: linear-gradient(0deg, transparent, transparent, #E90064, #E90064, #E90064);
		z-index: 1;
		transform-origin: bottom right;
		animation: animate 6s linear infinite;
		animation-delay: -4.5s;
	}

	@keyframes animate {
		0% {
			transform: rotate(0deg);
		}

		100% {
			transform: rotate(360deg);
		}
	}

	.box form {
		position: absolute;
		inset: 4px;
		background: #222;
		padding: 40px 40px;
		border-radius: 8px;
		z-index: 2;
		display: flex;
		flex-direction: column;
	}

	.box form h2 {
		color: #fff;
		font-weight: 500;
		text-align: center;
		letter-spacing: 0.1em;
	}

	.box form .inputBox {
		position: relative;
		width: 300px;
		margin-top: 35px;
		margin-bottom: 20px;
	}

	.box form .inputBox input {
		position: relative;
		width: 100%;
		padding: 10px 10px;
		background: transparent;
		outline: none;
		box-shadow: none;
		color: #23242a;
		font-size: 1em;
		letter-spacing: 0.05em;
		transition: 0.5s;
		z-index: 5;
		border: none;
	}

	.box form .inputBox span {
		position: absolute;
		left: 0;
		padding: 20px 10 px 10 px;
		pointer-events: none;
		color: #8f8f8f;
		font-size: 1em;
		letter-spacing: 0.05em;
		transition: 0.5s;
	}

	.box form .inputBox input:valid~span,
	.box form .inputBox input:focus~span {
		color: #fff;
		font-size: 0.75em;
		transform: translateY(-34px);
	}

	.box form .inputBox i {
		position: absolute;
		left: 0;
		bottom: 0;
		width: 100%;
		height: 2px;
		background: #fff;
		border-radius: 4px;
		overflow: hidden;
		transition: 0.5s;
		pointer-events: none;
	}

	.box form .inputBox input:valid~i,
	.box form .inputBox input:focus~i {
		height: 44px;
	}

	.box form .links {
		display: flex;
		justify-content: flex-end;
	}

	.box form .links a {
		margin: 10px o;
		font-size: o.75em;
		color: #8f8f8f;
		text-decoration: none;
	}

	.box form .links a:hover,
	.box form .links a:nth-child(2) {
		color: #fff;
	}

	.box form input[type="submit"] {
		border: none;
		outline: none;
		padding: 9px 25px;
		background: #fff;
		cursor: pointer;
		font-size: 0.9em;
		border-radius: 4px;
		font-weight: 600;
		width: 100px;
		margin-top: 10px;
	}

	.box form input[type="submit"]:active {
		opacity: 0.8;
	}

	.btn-register {
		font-size: 20px !important;
		border: none;
		outline: none;
		padding: 5px 5px;
		background: #fff;
		cursor: pointer;
		font-size: 0.9em;
		border-radius: 4px;
		font-weight: 600;
		/* width: 100px; */
		margin-top: 10px;
		width: 100%;
	}

	.btn-register:hover {
		background-color: #d9d8d8;
	}

	.links {
		margin-bottom: 10px;
	}
</style>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Register Form</title>

</head>

<body>
	<div class="box">
		<span class="borderLine"></span>
		<form action="" method="POST" class="login-email">
			<h2>Sign Up</h2>
			<div class="inputBox">
				<input type="text" name="username" value="<?php echo $username; ?>" required>
				<span>Username</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input type="email" name="email" value="<?php echo $email; ?>" required>
				<span>Email</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input type="password" name="password" value="<?php echo $_POST['password']; ?>" required>
				<span>Password</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input type="password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
				<span>Confirm Password</span>
				<i></i>
			</div>
			<div class="links">
				<a href="index.php">Sign In</a>
			</div>
			<div class="register">
				<button class="btn-register" type="submit">Register</button>
			</div>
		</form>
	</div>
</body>

</html>
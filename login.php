<!DOCTYPE html>
<html>



<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Ensat : Login</title>
</head>

<body>
	<?php
	include('connect.php');
	session_start();
	
	if (isset($_POST['user'])) {
		$user = stripslashes($_POST['user']);
		$user = mysqli_real_escape_string($conn, $user);
		$passwd = stripslashes($_POST['passwd']);
		$passwd = mysqli_real_escape_string($conn, $passwd);
		$passwd = md5($passwd);
		$sql = "SELECT * FROM `comptes` WHERE user='$user' and passwd='$passwd'";
		$result = mysqli_query($conn, $sql);
		$rows = mysqli_num_rows($result);
		if ($rows == 1) {
			$_SESSION['user'] = $user;
			header("Location: index.php");
		} else {?>
			<br>
            <br>
            <br>
			<h1> Login failed. Invalid username or password.</h1> 
            
            <br>
            <br>
            <br>
            <center><a href="login.php" > <input type="submit" class="btn btn-primary" value="Go Back"> </a>
		<?php
		}
	} else {
	?>
		<center>
			<br>
			<!-- <h1 style ="font-size:180px">Login<h1> -->
				<img height="300" width="500" src="ensa tanger.png">
		</center>
		<div class="center">
			<br>
			<br>
			<br>
			<br>
			<br>

			<div class="d-flex justify-content-center">
			
					<center>
						<form method="post" name="login">
							<div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1">Username : </span>
								<input type="text" class="form-control" name="user" placeholder="Username" required>
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1">Password : </span>
								<input type="password" class="form-control" name="passwd" placeholder="Password" required>
							</div>

							<br>
			
								<input name="submit" class="btn btn-primary" type="submit" value="Login">
								<a href="signup.php" class="btn btn-primary">Sign Up</a>
							
					</center>
					</form>

			</div>
		</div>
	<?php } ?>


</body>

</html>
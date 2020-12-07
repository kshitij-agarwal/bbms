<?php
include('connection.php');
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/s1.css">
</head>

<body>
	<div id="full">
		<div id="inner-full">
			<div id="header">
				<h2> Blood Bank Management System</h2>
			</div>

			<div id="body">

				<br><br><br><br><br>

				<form action="" method="post">
					<table align="center">
						<tr>
							<td width="200px" height="70px"><b>Enter Username</b></td>
							<td width="200px" height="70px">
								<input type="text" name="un" placeholder="Enter Username" style="width:180px; height:30px; border-radius:10px;">
								<!-- Configuring the button below: Name for the username button is "un" -->
							</td>
						</tr>

						<tr>
							<td width="200px" height="70px"><b>Enter Password</b></td>
							<td width="200px" height="70px">
								<input type="text" name="ps" placeholder="Enter Password" style="width:180px; height:30px; border-radius:10px;">
								<!-- Configuring the button below:  Name for the Password button is "ps"-->
							</td>
						</tr>
 
						<tr>
							<td>
								<input type="submit" name="sub" value="Login" style="width: 70px;height: 30px;border-radius: 5px;">
								<!-- Login button with ID as "sub" acronym submit -->
							</td>
						</tr>
					</table>
				</form>

				<?php
				if (isset($_POST['sub'])) 
				// When the login button is clicked..
				{
					$un = $_POST['un'];
					// Bring the entered data in username and store it here
					$ps = $_POST['ps'];
					// Bring the entered data in password and store it here
					
					$q = $db->prepare("SELECT * FROM admin WHERE uname='$un' && pass='$ps'");
					$q->execute();
					$res = $q->fetchAll(PDO::FETCH_OBJ);

					if ($res) 
					{
						$_SESSION['un'] = $un;
						header("Location:admin-home.php");
					} 
					else 
					{
						echo "<script>alert('Wrong User')</script>";
					}
				}
				?>
			</div>

			<div id="footer">
				<h4 align="center">SDP Project</h4>
			</div>
		</div>
	</div>
</body>

</html>
<?php
require_once "connect.php";
session_start();
if(!isset($_POST['login'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>Status</title>
</head>
<body>
	<form action="index.php" method="post">
	<table>
		<tr>
			<td>Username</td>
			<td><input type="text" name="uname" placeholder="HandleName"/></td>
		</tr>
		<tr>
			<td>Password: </td>
			<td><input type="password" name="pass" placeholder="Password"/></td>
		</tr>
		<tr>
			<td><input type="submit" name="login" value="Login"></td>
		</tr>
		<tr>
			<td>New User?</td>
			<td><a href="register.php" class="button">Register</a></td>
		</tr>
	</table>
	</form>	
</body>
</html>
<?php
}else{
	$_SESSION['username'] = $_POST['uname'];
	function keymaker($password){
		$key = 'sxwrsxetdcbugynhmjoiokjimhuyntrbdcesxwe5dcr6vft7bgy8hnu9mjiko';
		$k = md5($password.$key);
		return $k;
	}
	$pass = keymaker($_POST['pass']);

	$query = mysql_query("select username, mailid from users where username='".$_SESSION['username']."' and password='".$pass."'");
	
	if(mysql_num_rows($query)){
		echo "<center>YOu have logged on successfully. Tabler under Work <h2>Get Lost</h2></center>";
	}else{
		echo "<center>Invalid username or password. Click <a href='index.php'>here</a> to Login Again</center>";
		//unset($_SESSION['username']);
	}
}
?>
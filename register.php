<?php
require_once 'connect.php';
if(!isset($_POST['register'])){
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
<form action="register.php" method="post">
	<tr>
		<td>Username: </td>
		<td><input type="text" name="uname" /></td>
	</tr>
	<tr>
		<td>Password: </td>
		<td><input type="password" name="pass1" /></td>
	</tr>
	<tr>
		<td>Re-type Password</td>
		<td><input type="password" name="pass2" /></td>
	</tr>
	<tr>
		<td>Mail-id</td>
		<td><input type="text" name="mailid" /></td>
	</tr>
	<tr>
		<td><input type="submit" name="register" value="Register" /></td>
	</tr>
</form>
</table>
</body>
</html>
<?php
}else{
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	$uname = $_POST['uname'];
	$mail = $_POST['mailid'];
	function keymaker($password){
		$key = 'sxwrsxetdcbugynhmjoiokjimhuyntrbdcesxwe5dcr6vft7bgy8hnu9mjiko';
		$k = md5($password.$key);
		return $k;
	}
	if($pass1 != $pass2){
		echo "<center`>Your passwords dont match. Try <a href='register.php' />Again</a></center>";
	}else{
		$pass3 = keymaker($pass1);
		mysql_query("insert into users (Username, password, mailid) values ('$uname', '$pass3', '$mail')");
		echo '<center>YOu have successfully registered Click <a href="index.php">here </a>to log In</center>.';
	}
}
?>
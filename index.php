<?php
require_once "connect.php";

session_start();
if(!isset($_POST['login'])){
?>
<!DOCTYPE html>
<html>
<head>
	<script type="type/javascript" src="post.js"></script>
	<title>Status</title>
		
</head>
<body>
	<a href="#" onclick="check()">clickhere</a>
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


<?php
}else{
	function keymaker($password){
		$key = 'sxwrsxetdcbugynhmjoiokjimhuyntrbdcesxwe5dcr6vft7bgy8hnu9mjiko';
		$k = md5($password.$key);
		return $k;
	}
	$pass = keymaker($_POST['pass']);

	$query = mysql_query("select username, mailid from users where username='".$_SESSION['username']."' and password='".$pass."'");
	
	if(mysql_num_rows($query)){
		echo "<center>YOu have logged on successfully. Tabler under Work <h2>Get Lost</h2></center>";

	$_SESSION['username'] = $_POST['uname'];
	echo "hi, ".$_SESSION['username'];
	echo "<H1>Ideas</H1>";
	echo "<div id='ideas' style='height:75px;width:240px;background-color:yellow;border:1px;'>";
	echo "<form name='from1'>";
	echo "<textarea name='msg' style='height:50px;width:200px;'></textarea>";
	echo "</form1>";
	echo "<span style='margin-left:150px;'><a href='#' onclick='postmsg()'>post</a></span>";
	echo "</div>";
	echo "<div id='post' style='background-color:red;width:240px;height:500px;'> loading posts....</div>";	
	}else{
		echo "<center>Invalid username or password. Click <a href='index.php'>here</a> to Login Again</center>";
		//unset($_SESSION['username']);
	}
}

?>
</body>
</html>
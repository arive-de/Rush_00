<?php
session_start();
require_once("connect_mysqli.php");

if (isset($_POST['login'], $_POST['passwd']))
{
	if ($_POST['login'] != '' && $_POST['passwd'] != '' )
	{
		$login = htmlspecialchars($_POST['login']);       // A poser des questions
		$passwd = htmlspecialchars($_POST['passwd']);
		$hash = hash('whirlpool', $passwd);
		if (create_account($login, $hash))
		{
			header("Location: login.php");
		}
	} 
	else
	{
		echo ("Please enter login AND password");
		session_destroy();
	}
}
?>

<html>
	<head>
		<h1>Creation de compte</h1>
	</head>
<body>
	<form action="create_account.php" method="post">
		Identifiant :<br />
		<input type="text" name="login" value="" ><br />
		Mot de passe :<br/>
		<input type="password" name="passwd" value="" /><br />
		<input type="submit" name="submit" value="OK" />
	</form>
</body>
</html>
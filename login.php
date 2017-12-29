<?PHP
session_start();

require_once("connect_mysqli.php");

if (isset($_POST['login'], $_POST['passwd']))
{
	if ($_POST['login'] != '' && $_POST['passwd'] != '')
	{
		$login = htmlspecialchars($_POST['login']);
		$passwd = htmlspecialchars($_POST['passwd']);
		$hash = hash('whirlpool', $passwd);
		if (login($login, $hash))
		{
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['passwd'] = $_POST['passwd'];
			header("Location: index.php");
		}
		else
		{
			echo "Wrong login/password RETRY";
			session_destroy();
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
		<h1>Se Connecter</h1>
	</head>
	<body>
		<form action="login.php" method="post">
			Identifiant :<br />
			<input type="text" name="login" value="" ><br />
			Mot de passe :<br/>
			<input type="password" name="passwd" value="" /><br />
			<input type="submit" name="submit" value="OK" />
		</form>
	</body>
</html>

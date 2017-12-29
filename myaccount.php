<?php
session_start();
require_once("connect_mysqli.php");
include("auth.php");
include("auth_admin.php");
?>

<html>
	<head>
		<title>Mon compte</title>
		<link rel="stylesheet" type="text/css" href="front.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php
				if ($logged)
					 include('header4.php');
				else
					include('header3.php');

		 ?>
		<div id="myacc">
			<div style="text-align:center">
				<p>Bienvenue sur votre page de compte cher "<?php echo $_SESSION['login'] ?>".</p>
			</div>
			<br>
			<p>Votre login actuel est : "<?php echo $_SESSION['login'] ?>"</p>
			<br><br>
			<p>Je veux supprimer mon compte</p>
			<form action="delete_account.php" method="post">
				<input type="submit" name="submit" value="Effacer mon compte à jamais" />
			</form>
			<?php
				if ($admin_on)
					include('admin.php');
			 ?>
		</div>
	</body>
</html>

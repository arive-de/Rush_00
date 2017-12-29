<?php
session_start();
require_once("connect_mysqli.php");

if (isset($_POST['unset_admin']) && !empty($_POST['unset_admin']))
{
	if (unset_admin($_POST['unset_admin']))
	{
		header("Location: myaccount.php");
	}
	else
		echo "Error\n";
}
?>
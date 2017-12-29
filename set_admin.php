<?php
session_start();
require_once("connect_mysqli.php");

if (isset($_POST['set_admin']) && !empty($_POST['set_admin']))
{
	if (set_admin($_POST['set_admin']))
	{
		header("Location: myaccount.php");
	}
	else
		echo "Error\n";
}
?>
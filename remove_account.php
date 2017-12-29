<?php
session_start();
require_once("connect_mysqli.php");

if (isset($_POST['erase']) && !empty($_POST['erase']))
{
	if (delete_account($_POST['erase']))
	{
		header("Location: myaccount.php");
	}
	else
		echo "Error\n";
}
?>
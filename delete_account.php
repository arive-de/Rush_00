<?php
session_start();
require_once("connect_mysqli.php");
if (delete_account($_SESSION['login']))
{
	if (logout($_SESSION['login']))
		header("Location: index.php");
}

include("logout.php");
?>
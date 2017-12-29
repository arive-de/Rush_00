<?php
session_start();
require_once("connect_mysqli.php");

if (isset($_SESSION['login'], $_SESSION['passwd']))
{
	$hash = hash('whirlpool', $_SESSION['passwd']);
	$logged = auth($_SESSION['login'], $hash);
}
?>
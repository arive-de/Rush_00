<?php
session_start();
require_once("connect_mysqli.php");
include("auth.php");

if ($_SESSION['login'] != "" && $_POST['order'] != "")
{
	product_into_order($_SESSION['login'], $_POST['order']);
	$_SESSION['produit'] = NULL;
	header('Location: monpanier.php');
}
else
	header('Location: monpanier.php');
?>
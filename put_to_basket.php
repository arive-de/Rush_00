<?php
session_start();
require_once("connect_mysqli.php");

if (!($_SESSION['produit']))
	$_SESSION['produit'] = array();
if (isset($_POST['produit']) && !empty($_POST['produit']))
{
	if (put_to_basket($_POST['produit']))
	{
		$_SESSION['produit'][] = $_POST['produit'];
		header("Location: index.php");
	}
	else
		echo "PAS DANS LE PANIER\n";
}
?>
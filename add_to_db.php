<?php
session_start();
require_once("connect_mysqli.php");


if ($_POST['name'] == "" || $_POST['category'] == "" || $_POST['price'] == "" || $_POST['image'] == "")
{
	echo "Please fill my holes\n";
}
else
{
	$new = file_get_contents($_POST['image']);
	file_put_contents("./images/".$_POST['name'], $new);
	product_into_db($_POST['category'], $_POST['name'], $_POST['price'], $_POST['name']);
	header('Location: myaccount.php');
}
?>
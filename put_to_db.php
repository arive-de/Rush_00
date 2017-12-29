<?php
require_once("connect_mysqli.php");
$all_products = scandir("./all_products");
$all_products = array_slice($all_products, 2);

foreach ($all_products as $product)
{
	$dir = scandir("./all_products/".$product);
	$dir = array_slice($dir, 2);
	$tab = NULL;
	foreach ($dir as $elem)
	{
		$tab[] = file_get_contents("./all_products/".$product."/".$elem);
	}
	product_into_db($tab[0], $tab[1], $tab[2], $tab[3]);
}

$hash = hash('whirlpool', "alix");
admin_into_db("alix", $hash, 1);

$hash = hash('whirlpool', "aurelien");
admin_into_db("aurelien", $hash, 1);
?>
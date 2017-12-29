<?php
session_start();

require_once("connect_mysqli.php");
include ("auth.php");

?>

<div class="index_header">
	<div class="index_tab"><a class="link" href="index.php">Accueil</a></div>
	<div class="index_tab"><a class="link" href="myaccount.php">Mon compte</a></div>
	<div class="index_tab"><a class="link" href="logout.php">Déconnexion</a></div>
	<div class="index_tab"><a class="link" href="monpanier.php">Mon Panier</a></div>
</div>
<br>
<br>
<br>

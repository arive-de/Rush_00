<?php
session_start();

require_once("connect_mysqli.php");
include ("auth.php");
?>

<html>
	<head>
		<title>Mon Panier</title>
		<link rel="stylesheet" type="text/css" href="front.css">
		<meta charset="utf-8">
	</head>
	<body>
	<br>
<?php
if ($logged)
	include('header4.php');
else
	include('header3.php');
?>
		<div>

<?php
if ($_SESSION['produit'])
{
	$array = array_count_values($_SESSION['produit']);
	$i = 0;
	$biff = 0;
	$tmp = array();
	foreach ($_SESSION['produit'] as $elem)
	{
		$i++;
		$biff = $biff + intval(basket_price($elem));
		if (!$tmp[$elem])
		{
			$tmp[$elem] = 1;
?>
						<div style="display:inline-block">
							<?php echo basket_name($elem); ?><br>
							<?php echo basket_price($elem);?>$<br>
							<img class="img_panier" src="./images/<?php echo basket_img($elem); ?>" alt="img"><br>
							Quantité : <?php echo $array[$elem] ?>
					   </div>
<?php
		}
	}
}
?>
					<p>Votre panier contient : <?php echo $i ?> objet(s)</p>
					<p>Montant total : <?php	echo $biff ?> euros</p>
					<?php if ($logged)
					{
				?>	<form action="archiver.php" method="post">
				<input type='text' name='order' value="<?php echo $biff ?>" hidden />
				<input type="submit" value="ARCHIVER ET COMMANDER" />
			</form>
			<?php
				}
			?>

		</div>
	</body>
</html>
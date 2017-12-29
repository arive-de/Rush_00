<?php
session_start();
require_once("connect_mysqli.php");
if(!$tab = get_name())
{
    echo "An error occured\n";
}
if(!$order = get_order())
{
	echo "An error occured\n";
}
?>
<div id="admin">
	<h2 style="color:black;text-align:center;">Session Administrateur</h1>
	<div id="userlist">
		<form action="remove_account.php" method="post" >
			<?php
				$user = all_user();
				foreach ($user as $key => $usr)
				{
					if ($_SESSION['login'] != $usr[0])
					{
						echo $usr[0].":";

				?>
				<input type='text' name='erase' value="<?php echo $usr[0]; ?>" hidden />
			  	<input type="submit" value="delete" />
			  	</form>
			  	<form action="set_admin.php" method="post" >
			  	<input type='text' name='set_admin' value="<?php echo $usr[0]; ?>" hidden />
			  	<input type="submit" value="set admin" />
			  	</form>
			  	<form action="unset_admin.php" method="post" >
			  	<input type='text' name='unset_admin' value="<?php echo $usr[0]; ?>" hidden />
			  	<input type="submit" value="unset admin" />
				</form>
			<?php
				 }
			 } 
			?>
	</div>
	<div id="additem">
		<h4>Ajouter un objet à la vente</h4>
		<form style="position:relative;" action="add_to_db.php" method="post" >
			Nom :<br>
			<input type="text" name="name" value=""><br><br>
			Categories :<br>
			<select name="category">
					<option value="homme">homme</option>
					<option value="femme">femme</option>
					<option value="T-shirts">T-shirts</option>
					<option value="Chaussettes">Chaussettes</option>
					<option value="Casquettes">Casquettes</option>
					<option value="SG">SG</option>
					<option value="homme T-shirts">homme T-shirts</option>
					<option value="femme T-shirts">femme T-shirts</option>
					<option value="homme Casquettes">homme Casquettes</option>
					<option value="femme Casquettes">femme Casquettes</option>
					<option value="homme Chaussettes">homme Chaussettes</option>
					<option value="femme Chaussettes">femme Chaussettes</option>
			</select><br><br>
			Prix :<br>
			<input type="text" name="price" value=""><br>
			<br>
			Image : <br>
			<input type="text" name="image" value=""><br>
			<input type="submit" name="Valider" value="Valider">
		</form><br>
		<h4>Supprimer un objet de la vente</h4>
		<form style="position:relative;" action="remove_from_db.php" method="post" >
			Nom :<br>
			<select name="name">
			<?php for ($i = 0; $i < sizeof($tab); $i++)
			{
			?>
					<option value="<?php echo $tab[$i]['name']?>" ><?php echo $tab[$i]['name'] ?></option>
						<?php	} ?>
			</select>
			<input type="submit" name="remove" value="Remove">
	
		</form>
	</div>
</div>
<div>
	<br><br><br><br><br><br><br><br>
	<h3>Order</h3>
	<?php
		for ($i = 0; $i < sizeof($order); $i++)
		{
			?>
				 Order numero : <?php echo $order[$i]['id']; ?><br>
				 Login : <?php echo $order[$i]['name']; ?><br>
				 Prix : <?php echo $order[$i]['price'];?>$<br>
				 <br>
				 <br>
<?php
		}
		?>
</div>
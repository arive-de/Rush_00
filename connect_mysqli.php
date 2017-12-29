<?PHP
function send_request($request)
{
	$database = mysqli_connect('localhost', 'root', 'root', 'monsite');

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}

	if (!($result = mysqli_query($database, $request)))
	{
		printf("Message d'erreur : %s\n", mysqli_error($database));
	}
	else
	{
		return ($result);
	}
	mysqli_close($database);
}

function product_into_db($category, $name, $price, $img)
{
	$req = "INSERT INTO product (category, name, price, img) VALUES ('".$category."', '".$name."', '".$price."', '".$img."');";

	$res = send_request($req);
	if ($res == 1)
		return (1);
	else
		return (0);
}

function product_into_order($name, $price)
{
	$req = "INSERT INTO basket (name, price) VALUES ('".$name."', '".$price."');";

	$res = send_request($req);
	if ($res == 1)
		return (1);
	else
		return (0);
}

function remove_from_db($name)
{
	$req = "DELETE FROM product WHERE name='".$name."';";

	$res = send_request($req);
	if ($res == 1)
		return (1);
	else
		return (0);
}

function admin_into_db($login, $password, $admin)
{
	$req = "INSERT INTO users (login, password, admin) VALUES ('".$login."', '".$password."', '".$admin."');";

	$res = send_request($req);
	if ($res == 1)
		return (1);
	else
		return (0);
}


function get_img()
{
	$req = "SELECT img FROM product";
	$res = send_request($req);
	$tab = array ();
	while($row = mysqli_fetch_array($res))
 	{
 		 $tab[] = $row;
 	}
 	return ($tab);
}

function get_name()
{
	$req = "SELECT name FROM product";
	$res = send_request($req);
	$tab = array ();
	while($row = mysqli_fetch_array($res))
 	{
 		 $tab[] = $row;
 	}
 	return ($tab);
}

function get_price()
{
	$req = "SELECT price FROM product";
	$res = send_request($req);
	$tab = array ();
	while($row = mysqli_fetch_array($res))
 	{
 		 $tab[] = $row;
 	}
 	return ($tab);
}

function get_category()
{
	$req = "SELECT category FROM product";
	$res = send_request($req);
	$tab = array ();
	while($row = mysqli_fetch_array($res))
 	{
 		 $tab[] = $row;
 	}
 	return ($tab);
}

function get_order()
{
	$req = "SELECT * FROM basket";
	$res = send_request($req);
	$tab = array ();
	while($row = mysqli_fetch_array($res))
 	{
 		 $tab[] = $row;
 	}
 	return ($tab);
}

function basket_img($name)
{
	$req = "SELECT img FROM product WHERE name='".$name."';";
	$res = send_request($req);
	if ($row = mysqli_fetch_array($res))
		return ($row[0]);
}

function basket_name($name)
{
	$req = "SELECT name FROM product WHERE name='".$name."';";
	$res = send_request($req);
	if ($row = mysqli_fetch_array($res))
		return ($row[0]);
}

function basket_price($name)
{
	$req = "SELECT price FROM product WHERE name='".$name."';";
	$res = send_request($req);
	if ($row = mysqli_fetch_array($res))
		return ($row[0]);
}


function create_account($login, $password)
{
	$req = "SELECT * FROM `users` WHERE login='".$login."';";
	$res = send_request($req);
	if (mysqli_num_rows($res) > 0)
	{
		echo "Login already exists\n";
	}
	else
	{
	$req2 = "INSERT INTO users (login, password, admin) VALUES ('".$login."', '".$password."', 0);";
	$res = send_request($req2);
	if ($res == 1)
	{
		return (1);
	}
	else
		return (0);
	}
}

function delete_account($login)
{
	$req = "DELETE FROM `users` WHERE `login`='".$login."';";

	$res = send_request($req);
	if ($res)
		return (1);
	else
		return (0);
}

function set_admin($login)
{
	$req = "UPDATE users SET admin=1 WHERE `login`='".$login."';";

	$res = send_request($req);
	if ($res)
		return (1);
	else
		return (0);
}

function unset_admin($login)
{
	$req = "UPDATE users SET admin=0 WHERE `login`='".$login."';";

	$res = send_request($req);
	if ($res)
		return (1);
	else
		return (0);
}

function logout($login)
{
	$req = "DELETE FROM `act` WHERE `act_login`='".$login."';";

	$res = send_request($req);
	if ($res)
		return (1);
	else
		return (0);

}

function all_user()
{
	$req = "SELECT login FROM `users`;";
	$res = send_request($req);
	while ($row = mysqli_fetch_array($res))
	{
		$tab[] = $row;
	}
	return ($tab);
}

function auth($login, $password)
{
	$req = "SELECT * FROM `act` WHERE act_login='".$login."' AND act_passwd='".$password."';";

	$res = send_request($req);
	if ($res)
		return (1);
	else
		return (0);
}



function is_admin($login, $password)
{
	$req = "SELECT admin FROM `users` WHERE login='".$login."' AND password='".$password."';";
	$res = send_request($req);
		if ($row = mysqli_fetch_array($res))
			return ($row[0]);
}

function put_to_basket($product)
{
	$req = "SELECT * FROM `product` WHERE `name`='".$product."';";

	$res = send_request($req);
	if ($res)
		return (1);
	else
		return (0);
}

function login($login, $password)
{
	$req = "SELECT `login` FROM `users` WHERE login='".$login."' AND password='".$password."';";
	$res = send_request($req);
	if (mysqli_num_rows($res) > 0)
	{
		$req2 = "INSERT INTO act (act_login, act_passwd) VALUES ('".$login."', '".$password."');";
		if ($res2 = send_request($req2))
			return (1);
		else
			return (0);
	}
	else
	{
		return (0);
	}
}

?>

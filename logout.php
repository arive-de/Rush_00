<?PHP
session_start();
require_once("connect_mysqli.php");

if (logout($_SESSION['login']))
{
	session_destroy();
	header("Location: index.php");
}
?>

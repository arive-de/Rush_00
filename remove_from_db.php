<?php
session_start();
require_once("connect_mysqli.php");

remove_from_db($_POST['name']);
header('Location: myaccount.php');

?>
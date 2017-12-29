<?php
session_start();
require_once("connect_mysqli.php");
include("auth.php");
if(!$tab = get_img())
{
    echo "An error occured\n";
}
if(!$tab2 = get_price())
{
    echo "An error occured\n";
}
if(!$tab3 = get_name())
{
    echo "An error occured\n";
}
if(!$tab4 = get_category())
{
    echo "An error occured\n";
}
include ('body_init.php');
?>
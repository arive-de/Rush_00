<?php

$database = mysqli_connect('localhost', 'root', 'root');
if (!$database)
{
	echo ("FAILED TO Connect to DATABASE\n");
	die();
}
if (!($result = mysqli_query($database, "CREATE DATABASE monsite")))
	printf("Message d'erreur : %s\n", mysqli_error($database));
else
	echo "DATABASE CREATED\n";

mysqli_select_db($database, "monsite");


if (!(mysqli_query($database, "CREATE TABLE Users (
									id int not null auto_increment,
									login varchar(255) not null,
									password varchar(255) not null,
									admin boolean not null,
									PRIMARY KEY (id));")))
		die (print("FAILED TO CREATE TABLES\n"));

if (!(mysqli_query($database, "CREATE TABLE act (
											id int not null auto_increment,
											act_login varchar(255) not null,
											act_passwd varchar(255) not null, 
											primary key (id))")))
		die ("FAILED TO CREATE TABLES\n");
else
	echo "ACT CREATED\n";

if (!(mysqli_query($database, "CREATE TABLE product (
												id int not null auto_increment,
												category varchar(255) not null,
												name varchar(255) not null,
												price varchar(255) not null,
												img varchar(255) not null,
												primary key (id))")))
		die ("FAILED TO CREATE TABLES\n");
else
	echo "PRODUCT CREATED\n";

if (!(mysqli_query($database, "CREATE TABLE basket (
												id int not null auto_increment,
												name varchar(255) not null,
												price varchar(255) not null,
												primary key (id))")))
		die ("FAILED TO CREATE TABLES\n");
else
	echo "BASKET CREATED\n"; 
include("put_to_db.php")
?>

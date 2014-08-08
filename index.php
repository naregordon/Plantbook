<?php
$db =  mysqli_connect("localhost","root","troiswa","plantesbook");
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}
session_start();

if(isset($_POST['deconnect'])) {
	$_SESSION = array();
	session_destroy();
}


$page = 'home';

if(isset($_POST['add-user'])) {
	if(isset($_SESSION['id'])) {
		$header = 'headerlog';
		$page='home';
	}
	else {
		$header = 'header';
		$page='home';
	}
}

elseif(isset($_POST['page_inscription'])) 
{
	if(isset($_SESSION['id'])) {
		$header = 'headerlog';
		$page='inscription';
	}
	else {
		$header = 'header';
		$page='inscription';
	}
}

elseif(isset($_POST['add-product']) || isset($_POST['maj'])) 
{
	if(isset($_SESSION['id'])) {
		$header = 'headerlog';
		$page='backend';
	}
	else {
		$header = 'header';
		$page='backend';
	}
}

elseif(isset($_POST['login'])) 
{
	if(isset($_SESSION['id'])) {
		$header = 'headerlog';
		$page='login';
	}
	else {
		$header = 'header';
		$page='login';
	}
}

elseif(isset($_POST['delete'])) 
{
	if(isset($_SESSION['id'])) {
		$header = 'headerlog';
		$page='backend';
	}
	else {
		$header = 'header';
		$page='backend';
	}
}

elseif(isset($_POST['modify'])) 
{
	if(isset($_SESSION['id'])) {
		$header = 'headerlog';
		$page='backend';
	}
	else {
		$header = 'header';
		$page='backend';
	}
}
elseif(isset($_POST['filterRec']) || isset($_POST['searchBtn']) || isset($_POST['filterDeco']) || isset($_POST['filterLeg']) || isset($_POST['filterFruit']) || isset($_POST['filterAro'])) {
	if(isset($_SESSION['id'])) {
		$header = 'headerlog';
		$page='shop';
	}
	else {
		$header = 'header';
		$page='shop';
	}
}

elseif(isset($_POST['addPanier'])) {
	if(isset($_SESSION['id'])) {
		$header = 'headerlog';
		$page='panier';
	}
	else {
		$header = 'header';
		$page='panier';
	}
}
elseif(isset($_POST['deconnect'])) {
	if(isset($_SESSION['id'])) {
		$header = 'headerlog';
		$page='home';
	}
	else {
		$header = 'header';
		$page='home';
	}
}
else {
	if(isset($_SESSION['id'])) {
		$header = 'headerlog';
	}
	else {
		$header = 'header';
	}
}

require("apps/skel.php");
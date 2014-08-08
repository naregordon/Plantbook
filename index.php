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

		$header = 'header';
		$page='inscription';
	
}

elseif(isset($_POST['page_inscription'])) 
{

		$header = 'header';
		$page='inscription';

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
	$emailLog  = $_POST['email'];
	$passwordLog  = md5($_POST['password']);
	$res = mysqli_query($db, "SELECT * FROM user WHERE user.email = '".$emailLog."'");
	$data = mysqli_fetch_assoc($res);
	if($data['email'] === $emailLog && $data['mot_de_passe'] === $passwordLog) {
		$_SESSION['id'] = $data['id'];
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
elseif(isset($_POST['payer']) || isset($_POST['deleteProduct'])) {

		$header = 'headerlog';
		$page='panier';

}
elseif(isset($_POST['profil']) || isset($_POST['profilModify']) || isset($_POST['profilDelete'])) {

		$header = 'headerlog';
		$page='profile';

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
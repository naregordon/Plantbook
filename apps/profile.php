<?php
$res = mysqli_query($db, "SELECT * FROM user WHERE id ='".$_SESSION['id']."'");
	$data = mysqli_fetch_assoc($res);

	$nom = $data['nom'];
	$prenom = $data['prenom'];
	$email = $data['email'];
	$numeroRue = $data['numero_rue'];
	$rue = $data['rue'];
	$ville = $data['ville'];
	$codePostal = $data['code_postal'];

if(isset($_POST['profilModify'])) {

	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$numeroRue = $_POST['numeroRue'];
	$rue = $_POST['rue'];
	$ville = $_POST['ville'];
	$codePostal = $_POST['codePostal'];

	mysqli_query($db, "UPDATE user SET nom = '".$nom."',prenom = '".$prenom."',email = '".$email."',numero_rue = '".$numeroRue."',rue = '".$rue."',ville = '".$ville."',code_postal = '".$codePostal."' WHERE id = '".$_SESSION['id']."'");
}

if(isset($_POST['profilDelete'])) {
	mysqli_query($db,"DELETE FROM user WHERE id ='".$_SESSION['id']."'");

	$_SESSION = array();
	session_destroy();

	$header = "header";
	$page = "home";
}

require("views/profile.phtml");
<?php 
if(isset($_POST['add-user'], $_POST['add-nom'], $_POST['add-prenom'] ,$_POST['add-email'], $_POST['add-password']) && strlen($_POST['add-nom']) < 50 && strlen($_POST['add-prenom']) < 50 && strlen($_POST['add-email']) < 150 && strlen($_POST['add-password']) < 50 && strlen($_POST['add-nom']) > 3 && strlen($_POST['add-prenom']) > 3 && strlen($_POST['add-email']) > 7 && strlen($_POST['add-password']) > 3)
{
	$nom = mysqli_real_escape_string($db, $_POST['add-nom']);
	$prenom = mysqli_real_escape_string($db,$_POST['add-prenom']);
	$email = mysqli_real_escape_string($db,$_POST['add-email']);
	$password = mysqli_real_escape_string($db,(md5($_POST['add-password'])));

	mysqli_query($db, "INSERT INTO user (nom, prenom, email, mot_de_passe)
 VALUES ('".$nom."', '".$prenom."', '".$email."', '".$password."')");
	$_SESSION['id'] = $data['id'];
	require('apps/home.php');
	// $res = mysqli_query($db, "SELECT id FROM user WHERE nom='".$nom."'");
	// $data = mysqli_fetch_assoc($res);
	// mysqli_query($db, "INSERT INTO panier (id_panier) VALUES ('".$data['id']."')");
}
else
	require('views/inscription.phtml');
?>
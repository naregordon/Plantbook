<?php 
if (isset($_POST['login'], $_POST['password'], $_POST['email']))
{
	$emailLog  = $_POST['email'];
	$passwordLog  = md5($_POST['password']);
	$res = mysqli_query($db, "SELECT * FROM user WHERE user.email = '".$emailLog."'");
	$data = mysqli_fetch_assoc($res);
	if ($emailLog == "email@admin.fr" && $passwordLog === "81dc9bdb52d04dc20036dbd8313ed055")
	{
		require ('apps/backend.php');
	}
	elseif ($data['email'] === $emailLog && $data['mot_de_passe'] === $passwordLog) {
		$_SESSION['id'] = $data['id'];
		require ('apps/home.php');
	}
	elseif($data['email'] === $emailLog && $data['mot_de_passe'] !== $passwordLog) {

		require ('apps/home.php');
		echo "le mot de passe n'est pas correcte !";
	}
	else {
		require ('apps/home.php');
		echo "ce compte n'existe pas";
	}
} 

?>
<?php 

if(isset($_POST['addPanier'])) {
	$res = mysqli_query($db, "SELECT * FROM produits WHERE id='".$_POST['idPanier']."'");
	$data = mysqli_fetch_assoc($res);
	mysqli_query($db, "INSERT INTO panier(nom, photo, prix, id_panier) VALUES ('".$data['nom']."','".$data['photo']."','".$data['prix']."','".$_SESSION['id']."')");
}
require("views/shop.phtml");
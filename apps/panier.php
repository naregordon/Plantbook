<?php 

if(isset($_POST['addPanier']) && isset($_SESSION['id'])) {
	$res = mysqli_query($db, "SELECT * FROM produits WHERE id='".$_POST['idPanier']."'");
	$data = mysqli_fetch_assoc($res);
	mysqli_query($db, "INSERT INTO panier(nom, photo, prix, id_panier) VALUES ('".$data['nom']."','".$data['photo']."','".$data['prix']."','".$_SESSION['id']."')");
}
else {
	echo "Connectez vous";
}

if(isset($_POST['payer'])) {
	$res = mysqli_query($db, "SELECT * FROM panier WHERE id_panier='".$_SESSION['id']."'");
    while($data = mysqli_fetch_assoc($res)) {
	mysqli_query($db, "UPDATE produits SET stock = stock-1 WHERE nom = '".$_POST['nomProduct']."'");
	mysqli_query($db, "DELETE FROM panier WHERE id_panier='".$_SESSION['id']."'");
	}
}

if(isset($_POST['deleteProduct'])) {
	mysqli_query($db, "DELETE FROM panier WHERE id = '".$_POST['idProduct']."'");
} 

require("views/home.phtml");
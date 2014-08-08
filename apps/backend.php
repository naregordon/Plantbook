<?php

	$nom = "";
	$description = "";
	$categorie = "";
	$photo = "";
	$stock = "";
	$prix = "";

if (isset($_POST['delete'])) {
	mysqli_query($db,"DELETE FROM produits WHERE id ='".$_POST['id']."'");
}

if (isset($_POST['modify'])) {
	$res = mysqli_query($db, "SELECT * FROM produits WHERE id ='".$_POST['id']."'");
	$data = mysqli_fetch_assoc($res);

	$nom = $data['nom'];
	$description = $data['description'];
	$categorie = $data['categorie'];
	$photo = $data['photo'];
	$stock = $data['stock'];
	$prix = $data['prix'];
}

if(isset($_POST['maj'])) {
	require 'models/uploadFile.class.php';
	$upload = new upLoadFile();
	$tmp_name=$_FILES['photo-product']['tmp_name'];
	$name=$_FILES['photo-product']['name'];
	$upload->upload($tmp_name,$name);

	$nameProduct = mysqli_real_escape_string($db, $_POST['name-product']);
	$descriptionProduct = mysqli_real_escape_string($db,$_POST['description-product']);
	$categorieProduct = mysqli_real_escape_string($db,$_POST['categorie-product']);
	$stockProduct = mysqli_real_escape_string($db,$_POST['stock-product']);
	$prixProduct = mysqli_real_escape_string($db,$_POST['prix-product']);


	mysqli_query($db, "UPDATE produits SET nom = '".$nameProduct."',description = '".$descriptionProduct."',categorie = '".$categorieProduct."',photo = '".$name."',stock = '".$stockProduct."',prix = '".$prixProduct."' WHERE id = '".$_POST['idmaj']."'");
}

if(isset($_POST['name-product'], $_POST['description-product'], $_POST['categorie-product'] ,$_POST['stock-product'], $_POST['add-product']))
{
	require ('models/uploadFile.class.php');
	$upload = new upLoadFile();

	$tmp_name=$_FILES['photo-product']['tmp_name'];
	$name=$_FILES['photo-product']['name'];
	$upload->upload($tmp_name,$name);

	$nameProduct = mysqli_real_escape_string($db, $_POST['name-product']);
	$descriptionProduct = mysqli_real_escape_string($db,$_POST['description-product']);
	$categorieProduct = mysqli_real_escape_string($db,$_POST['categorie-product']);
	$stockProduct = mysqli_real_escape_string($db,$_POST['stock-product']);
	$prixProduct = mysqli_real_escape_string($db,$_POST['prix-product']);

	mysqli_query($db, "INSERT INTO produits (nom, description, categorie, stock, prix, photo)
 	VALUES ('".$nameProduct."', '".$descriptionProduct."', '".$categorieProduct."', '".$stockProduct."', '".$prixProduct."', '".$name."')");
}

require('models/produit.class.php');
$listProduct = "SELECT * FROM produits";

echo "<table class='produits_backend'>
			<tr>
				<th>Photo</th>
				<th>ID</th>
	        	<th>Nom</th>
	        	<th>Catégorie</th>	
	        	<th>Description</th>
	        	<th>Prix</th>
	        	<th>Stock</th>
	        	<th>Supprimer</th>
	        	<th>Modifier</th>

	        </tr>";

if ($result = mysqli_query($db, $listProduct)) {

    while ($obj = mysqli_fetch_object($result,"Produit")) {
    	echo "<tr>
		        <td><img class='imgb' src='sources/images_load/".$obj->getPhoto()."'alt='img'></td>
		        <td>".$obj->getId()." </td>
		        <td>". $obj->getNom()."</td>
		        <td>".$obj->getCategorie()."</td>
		        <td>". $obj->getDescription() ."</td>
		        <td>". $obj->getPrix() ."€</td>
		        <td>". $obj->getStock()."</td>

		        <td>
		        <form action='index.php' method='POST'>
		        <input type='hidden' name='id' value='".$obj->getId()."'>
		        <input type='submit' name='delete' value='Supprimer'>

		        </form>
		        </td>
		        <td>
		        <form action='index.php' method='POST'>
		        <input type='hidden' name='id' value='".$obj->getId()."'>
		        <input type='submit' name='modify' value='Modifier'>
		        </form>
		        </td>
	        </tr>";
    }
    mysqli_free_result($result);
}

echo "</table>";

require("views/backend.phtml");
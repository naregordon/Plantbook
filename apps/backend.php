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

if ($result = mysqli_query($db, $listProduct)) {

    while ($obj = mysqli_fetch_object($result,"Produit")) {
        echo "<div class='affProduit'> <form action='index.php' method='POST'><img class='ico-back' src='sources/images_load/".$obj->getPhoto()."'alt='img'> id : ".$obj->getId()." nom :". $obj->getNom()." description :". $obj->getDescription() ." prix :". $obj->getPrix() ."€ stock :". $obj->getStock()." categorie :".$obj->getCategorie()." <input type='hidden' name='id' value='".$obj->getId()."'> <input type='submit' name='delete' value='supprimer'><input type='submit' name='modify' value='modifier'></form></div>";
    }
    mysqli_free_result($result);
}

require("views/backend.phtml");
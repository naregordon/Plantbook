<?php 

require('models/produit.class.php');

if(isset($_POST['searchProduct']) && isset($_POST['searchBtn'])) {
	$listProduct = "SELECT * FROM produits WHERE nom LIKE '%".$_POST['searchProduct']."%'";

	if ($result = mysqli_query($db, $listProduct)) {

	    while ($obj = mysqli_fetch_object($result,"Produit")) {
	        echo "<div class='affProduit'> <form action='index.php' method='POST'><img class='ico-back' src='sources/images_load/".$obj->getPhoto()."'alt='img'> nom :". $obj->getNom()." description :". $obj->getDescription() ." prix :". $obj->getPrix() ."€ stock :". $obj->getStock()." <input type='hidden' name='idPanier' value='".$obj->getId()."'> <input type='submit' name='addPanier' value='Ajouter au panier'></form></div>";
	    }
	    mysqli_free_result($result);
	}
	$page="shop";
}

elseif(isset($_POST['filterLeg'])) {
	$listProduct = "SELECT * FROM produits WHERE categorie='legume'";

	if ($result = mysqli_query($db, $listProduct)) {

	    while ($obj = mysqli_fetch_object($result,"Produit")) {
	        echo "<div class='affProduit'> <form action='index.php' method='POST'><img class='ico-back' src='sources/images_load/".$obj->getPhoto()."'alt='img'> nom :". $obj->getNom()." description :". $obj->getDescription() ." prix :". $obj->getPrix() ."€ stock :". $obj->getStock()." <input type='hidden' name='idPanier' value='".$obj->getId()."'> <input type='submit' name='addPanier' value='Ajouter au panier'></form></div>";
	    }
	    mysqli_free_result($result);
	}
	$page="shop";
}

elseif(isset($_POST['filterFruit'])) {
	$listProduct = "SELECT * FROM produits WHERE categorie='fruit'";

	if ($result = mysqli_query($db, $listProduct)) {

	    while ($obj = mysqli_fetch_object($result,"Produit")) {
	        echo "<div class='affProduit'> <form action='index.php' method='POST'><img class='ico-back' src='sources/images_load/".$obj->getPhoto()."'alt='img'> nom :". $obj->getNom()." description :". $obj->getDescription() ." prix :". $obj->getPrix() ."€ stock :". $obj->getStock()." <input type='hidden' name='idPanier' value='".$obj->getId()."'> <input type='submit' name='addPanier' value='Ajouter au panier'></form></div>";
	    }
	    mysqli_free_result($result);
	}
	$page="shop";
}

elseif(isset($_POST['filterAro'])) {
	$listProduct = "SELECT * FROM produits WHERE categorie='aromatique'";

	if ($result = mysqli_query($db, $listProduct)) {

	    while ($obj = mysqli_fetch_object($result,"Produit")) {
	        echo "<div class='affProduit'> <form action='index.php' method='POST'><img class='ico-back' src='sources/images_load/".$obj->getPhoto()."'alt='img'> nom :". $obj->getNom()." description :". $obj->getDescription() ." prix :". $obj->getPrix() ."€ stock :". $obj->getStock()." <input type='hidden' name='idPanier' value='".$obj->getId()."'> <input type='submit' name='addPanier' value='Ajouter au panier'></form></div>";
	    }
	    mysqli_free_result($result);
	}
	$page="shop";
}

elseif(isset($_POST['filterDeco'])) {
	$listProduct = "SELECT * FROM produits WHERE categorie='decoratif'";

	if ($result = mysqli_query($db, $listProduct)) {

	    while ($obj = mysqli_fetch_object($result,"Produit")) {
	        echo "<div class='affProduit'> <form action='index.php' method='POST'><img class='ico-back' src='sources/images_load/".$obj->getPhoto()."'alt='img'> nom :". $obj->getNom()." description :". $obj->getDescription() ." prix :". $obj->getPrix() ."€ stock :". $obj->getStock()." <input type='hidden' name='idPanier' value='".$obj->getId()."'> <input type='submit' name='addPanier' value='Ajouter au panier'></form></div>";
	    }
	    mysqli_free_result($result);
	}
	$page="shop";
}

require("views/shop.phtml");
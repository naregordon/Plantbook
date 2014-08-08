<?php
class Produit {
	private $id;
	private $nom;
	private $description;
	private $prix;
	private $stock;
	private $categorie;
	private $photo;

	public function getNom() {
		return $this->nom;
	}

	public function getDescription() {
		return $this->description;
	}

	public function getPrix() {
		return $this->prix;
	}

	public function getStock() {
		return $this->stock;
	}

	public function getCategorie() {
		return $this->categorie;
	}

	public function getPhoto() {
		return $this->photo;
	}

	public function getId() {
		return $this->id;
	}
}
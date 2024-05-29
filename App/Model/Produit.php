<?php
namespace App\Model;

use App\Utils\BddConnect;

class Produit extends BddConnect
{
    //Attributs
    private ?int $id_produit;
    private ?string $nom_produit;
    private ?float $prix_produit;
    private ?int $stock_produit;
    private ?string $description_produit;
    //Getters et Setters
    public function getId(): ?int
    {
        return $this->id_produit;
    }
    public function setId(?int $id): void
    {
        $this->id_produit = $id;
    }
    public function getNom(): ?string
    {
        return $this->nom_produit;
    }
    public function setNom(?string $nom): void
    {
        $this->nom_produit = $nom;
    }
    public function getPrix(): ?float
    {
        return $this->prix_produit;
    }
    public function setPrix(?float $prix): void
    {
        $this->prix_produit = $prix;
    }
    public function getStock(): ?int
    {
        return $this->stock_produit;
    }
    public function setStock(?string $stock): void
    {
        $this->stock_produit = $stock;
    }
    public function getDescription(): ?string
    {
        return $this->description_produit;
    }
    public function setDescription(?string $description): void
    {
        $this->description_produit = $description;
    }
    public function getAllProduits(): array
    {
        try {
            $requete = $this->connexion()->prepare("SELECT * FROM produit");
            $requete->execute();
            $requete->setFetchMode(\PDO::FETCH_ASSOC);
            return $requete->fetchAll();
        } catch (\Exception $e) {
            die('Error : ' . $e->getMessage());
        }
    }
    public function getProduitById($id): Produit|bool
    {
        try {
            $requete = $this->connexion()->prepare(
                'SELECT id_produit, 
                        nom_produit, 
                        prix_produit, 
                        stock_produit, 
                        description_produit,
                        image_produit 
                FROM produit
                WHERE id_produit = ?'
            );
            $requete->bindParam(1, $id, \PDO::PARAM_STR);
            $requete->execute();
            $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Produit::class);
            return $requete->fetch();
        } catch (\Exception $e) {
            die('Error : ' . $e->getMessage());
        }
    }
}
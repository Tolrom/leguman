<?php
namespace App\Controller;

use App\Model\Produit;
use App\Utils\Utilitaire;
use App\Vue\Template;

class ProduitController extends Produit
{
    public function showProduits() {
        $error = '';
        $data = $this->getAllProduits();
        Template::render(
            'navbar.php',
            'Les paniers',
            'vueShop.php',
            'footer.php',
            $error,
            ['script.js', 'main.js'],
            ['style.css', 'main.css'],
            $data
        );
    }
    public function showProduit($id) {
        $error = '';
        $panier = $this->getProduitById($id);
        $data = [
            'id' => $panier->getId(),
            'nom' => $panier->getNom(),
            'prix' => $panier->getPrix(),
            'stock' => $panier->getStock(),
            'description' => $panier->getDescription(),
        ];
        if (isset($_POST['ajout'])) {
            $_SESSION['panier'][$_GET['id']]['quantite']++;
        }
        Template::render(
            'navbar.php',
            $panier->getNom(),
            'vueProduit.php',
            'footer.php',
            $error,
            ['script.js', 'main.js'],
            ['style.css', 'main.css'],
            $data
        );
    }
    public function orderProduits()
    {
        $error = '';

        Template::render(
            'navbar.php',
            'Votre panier',
            'vueCommande.php',
            'footer.php',
            $error,
            ['script.js', 'main.js'],
            ['style.css', 'main.css'],
            // $data
        );
    }
}
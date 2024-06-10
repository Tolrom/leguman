<?php
require_once './env.php';
// Import de l'autoloader des classes
require_once './vendor/autoload.php';
use App\Controller\HomeController;
use App\Controller\UtilisateurController;
use App\Controller\ProduitController;

$utilisateurController = new UtilisateurController();
$homeController = new HomeController();
$produitController = new ProduitController();
// Utilisation de session_start(pour gérer la connexion au serveur)
session_start();
// Gestion du panier
$produits = $produitController->getAllProduits();
foreach ($produits as $value) {
    if (isset(
            $_SESSION['panier']
                [$value['id_produit']]
                    ['quantite']
            )) {
        $qt = $_SESSION['panier']
                [$value['id_produit']]
                    ['quantite'];
    } else {
        $qt = 0;
    }
    $_SESSION['panier'][$value['id_produit']] = [
        'nom' => $value['nom_produit'],
        'prix' => $value['prix_produit'],
        'image' => $value['image_produit'],
        'quantite' => $qt,
        'id' => $value['id_produit'],
    ];
}
if (isset($_POST['add'])) {
    $_SESSION['panier'][$_POST['add']]['quantite']++;
}
if (isset($_POST['remove'])) {
    $_SESSION['panier'][$_POST['remove']]['quantite']--;
}

//      Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//      Test si l'url possède une route sinon on renvoie à la racine
$path = isset($url['path']) ? $url['path'] : '/';

//      Routeur connecté
if (isset($_SESSION["connected"])) {
    switch ($path) {
        case '/leguman/':
            $homeController->getHome();
            break;
        case '/leguman/utilisateur/add':
            $homeController->getHome();
            break;
        case '/leguman/utilisateur/login':
            $homeController->getHome();
            break;
        case '/leguman/utilisateur/logout':
            $utilisateurController->deconnexionUtilisateur();
            break;
        case '/leguman/aboutUs':
            $homeController->getAboutUs();
            break;
        case '/leguman/utilisateur/infos':
            $utilisateurController->infosUtilisateur();
            break;
        case '/leguman/shop':
            $produitController->showProduits();
            break;
        case '/leguman/shop/produit':
            if (isset($_GET['id'])) {
                $produitController->showProduit($_GET['id']);
            } else {
                header('Location: /leguman/shop');
            }
            break;
        case 'leguman/shop/order':
            $produitController->orderProduits();
            break;
        case '/leguman/utilisateur/reset':
            $utilisateurController->connexionUtilisateur();
            break;
        default:
            $homeController->get404();
            break;
    }
} else {
    switch ($path) {
        case '/leguman/':
            $homeController->getHome();
            break;
        case '/leguman/aboutUs':
            $homeController->getAboutUs();
            break;
        case '/leguman/utilisateur/add':
            $utilisateurController->addUtilisateur();
            break;
        case '/leguman/utilisateur/login':
            $utilisateurController->connexionUtilisateur();
            break;
        case '/leguman/utilisateur/logout':
            $homeController->getHome();
            break;
        case '/leguman/utilisateur/deconnexion':
            $homeController->getHome();
            break;
        case '/leguman/utilisateur/infos':
            $utilisateurController->addUtilisateur();
            break;
        case '/leguman/shop':
            $produitController->showProduits();
            break;
        case '/leguman/shop/produit':
            if (isset($_GET['id'])) {
                $produitController->showProduit($_GET['id']);
            } else {
                header('Location: /leguman/shop');
            }
            break;
        case '/leguman/utilisateur/reset':
            $utilisateurController->resetPassword();
            break;
        case 'leguman/shop/order':
            $utilisateurController->connexionUtilisateur();
            break;
        default:
            $homeController->get404();
            break;
    }
}
<?php
require_once './env.php';
//import de l'autoloader des classes
require_once './vendor/autoload.php';
use App\Controller\HomeController;
use App\Controller\UtilisateurController;

$utilisateurController = new UtilisateurController();
$homeController = new HomeController();
//utilisation de session_start(pour gérer la connexion au serveur)
session_start();
//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test si l'url posséde une route sinon on renvoi à la racine
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
        default:
            $homeController->get404();
            break;
    }
}
<?php
namespace App\Controller;

use App\Model\Utilisateur;
use App\Utils\Utilitaire;
use App\Vue\Template;

class UtilisateurController extends Utilisateur
{
    public function addUtilisateur(): void
    {
        $error = "";
        //                  Tester si le bouton est cliqué
        if (isset($_POST["submit"])) {
            //                  Tester si les champs sont remplis
            if (
                !empty($_POST["nom_utilisateur"]) and !empty($_POST["prenom_utilisateur"]) and
                !empty($_POST["email_utilisateur"]) and !empty($_POST["password_utilisateur"]) and
                !empty($_POST["password_confirm"])
            ) {
                //                  Tester si les 2 mots de passe correspondent
                if ($_POST["password_utilisateur"] == $_POST["password_confirm"]) {
                    $mail = Utilitaire::cleanInput($_POST["email_utilisateur"]);
                    $this->setMail($mail); 
                    //                  Test si le compte n'existe pas
                    if (!$this->getUtilisateurByMail()) {
                        //                  Hasher le mot de passe
                        $hash = password_hash(Utilitaire::cleanInput($_POST["password_utilisateur"]), PASSWORD_DEFAULT);
                        //                  Nettoyer les entrées du fomulaire
                        $nom = Utilitaire::cleanInput($_POST["nom_utilisateur"]);
                        $prenom = Utilitaire::cleanInput($_POST["prenom_utilisateur"]);
                        //                  Setter les valeurs dans l'objet Utilisateur
                        $this->setNom($nom);
                        $this->setPrenom($prenom);
                        $this->setPassword($hash);
                        $this->getRole()->setId(1);
                        //                  Ajouter en bdd
                        $this->insertUtilisateur();
                        $error = "Vous êtes désormais inscrit.";
                        //                  Redirection
                        header("Refresh:1; url=/leguman");
                    }
                    //                  Test si le compte existe
                    else {
                        $error = "Les informations d'inscription sont incorrectes";
                    }
                }
                //                  Les mots de passe sont différents
                else {
                    $error = "Les mots de passe sont différents";
                }
            }
            //                  Test si les champs ne sont pas remplis
            else {
                $error = "Veuillez remplir tous les champs du formulaire";
            }
        }
        Template::render(
            'navbar.php',
            'Inscription',
            'vueAddUser.php',
            'footer.php',
            $error,
            ['main.js'],
            ['main.css']
        );
    }
    public function connexionUtilisateur(): void
    {
        $error = "";
        //test si le bouton est cliqué
        if (isset($_POST["submit"])) {
            //test si les champs sont bien remplis
            if (!empty($_POST["mail_utilisateur"]) and !empty($_POST["password_utilisateur"])) {

                $email = Utilitaire::cleanInput($_POST["mail_utilisateur"]);
                $this->setMail($email);
                //récupérer le compte utilisateur ou false
                $recup = $this->getUtilisateurByMail();
                //test si le compte existe
                if ($recup) {
                    //mot de passe BDD
                    $hash = $recup->getPassword();
                    //password formulaire
                    $password = Utilitaire::cleanInput($_POST["password_utilisateur"]);
                    //test si le mot de passe est valide
                    if (password_verify($password, $hash)) {
                        //créer une session
                        $_SESSION["connected"] = true;
                        $_SESSION["nom"] = $recup->getNom();
                        $_SESSION["prenom"] = $recup->getPrenom();
                        $_SESSION["id"] = $recup->getId();
                        $error = "Connecté";
                        //redirection
                        header("Refresh:1; url=/leguman");
                    }
                    //test si le password est invalide
                    else {
                        $error = "Les informations de connexion sont invalides";
                    }
                }
                //test si le compte n'existe pas
                else {
                    $error = "Les informations de connexion sont invalides";
                }
            } else {
                $error = "Veuillez remplir tous les champs du formulaire";
            }
        }
        Template::render(
            'navbar.php',
            'Connexion',
            'vueConnexion.php',
            'footer.php',
            $error,
            ['main.js'],
            ['main.css']
        );
    }
    public function deconnexionUtilisateur(): void
    {
        session_destroy();
        unset($_COOKIE["PHPSESSID"]);
        header("location:/leguman");
    }
    public function infosUtilisateur(): void
    {
        $error = "";
        $id = $_SESSION["id"];
        $this->setId($id);
        $user = $this->getUtilisateurById();
        // dd($user);
        Template::render(
            'navbar.php',
            'Mes infos',
            'vueUtilisateur.php',
            'footer.php',
            $error,
            ['main.js', 'script.js'],
            ['main.css', 'style.css']
        );
    }
    public function resetPassword(): void
    {
        $error = '';
        if (isset($_POST['reset'])) {
            if (!empty($_POST["mail_utilisateur"])) {
                $email = Utilitaire::cleanInput($_POST["mail_utilisateur"]);
                $this->setMail($email);
                $recup = $this->getUtilisateurByMail();
                if ($recup) {
                    $error = 'Un mail contenant les instructions de récupération vous a été envoyé.';
                } else {
                    $error = 'Veuillez renseigner une adresse mail présente dans notre base de données.';
                }
            } else {
                $error = 'Veuillez renseigner une adresse mail';
            }
        }
        Template::render(
            'navbar.php',
            'Mot de passe oublié',
            'vueReset.php',
            'footer.php',
            $error,
            ['main.js', 'script.js'],
            ['main.css', 'style.css']
        );
    }
}

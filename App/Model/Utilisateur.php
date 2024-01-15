<?php
namespace App\Model;

use App\Utils\BddConnect;
use App\Model\Roles;

class Utilisateur extends BddConnect
{
    //Attributs
    private ?int $id_utilisateur;
    private ?string $nom_utilisateur;
    private ?string $prenom_utilisateur;
    private ?string $email_utilisateur;
    private ?string $password_utilisateur;
    private ?string $telephone_utilisateur;
    private ?bool $statut_utilisateur;
    private ?Roles $role;
    //Constructeur
    public function __construct()
    {
        $this->role = new Roles();
    }
    //Getters et Setters
    public function getId(): ?int
    {
        return $this->id_utilisateur;
    }
    public function setId(?int $id): void
    {
        $this->id_utilisateur = $id;
    }
    public function getNom(): ?string
    {
        return $this->nom_utilisateur;
    }
    public function setNom(?string $nom): void
    {
        $this->nom_utilisateur = $nom;
    }
    public function getPrenom(): ?string
    {
        return $this->prenom_utilisateur;
    }
    public function setPrenom(?string $prenom): void
    {
        $this->prenom_utilisateur = $prenom;
    }
    public function getMail(): ?string
    {
        return $this->email_utilisateur;
    }
    public function setMail(?string $email): void
    {
        $this->email_utilisateur = $email;
    }
    public function getPhone(): ?string
    {
        return $this->telephone_utilisateur;
    }
    public function setPhone(?string $phone): void
    {
        $this->telephone_utilisateur = $phone;
    }
    public function getPassword(): ?string
    {
        return $this->password_utilisateur;
    }
    public function setPassword(?string $password): void
    {
        $this->password_utilisateur = $password;
    }
    public function getStatut(): ?bool
    {
        return $this->statut_utilisateur;
    }
    public function setStatut(?bool $statut): void
    {
        $this->statut_utilisateur = $statut;
    }
    public function getRole(): ?Roles
    {
        return $this->role;
    }
    public function setRole(?Roles $role): void
    {
        $this->role = $role;
    }
    //Méthodes
    public function insertUtilisateur(): void
    {
        try {
            //Récupération des données
            $nom = $this->nom_utilisateur;
            $prenom = $this->prenom_utilisateur;
            $email = $this->email_utilisateur;
            $password = $this->password_utilisateur;
            $id_roles = $this->role->getId();
            //Requête SQL
            $requete = $this->connexion()->prepare('INSERT INTO utilisateur(
                nom_utilisateur,prenom_utilisateur,email_utilisateur,password_utilisateur,id_roles
                ) VALUE(?,?,?,?,?)'
            );
            $requete->bindParam(1, $nom, \PDO::PARAM_STR);
            $requete->bindParam(2, $prenom, \PDO::PARAM_STR);
            $requete->bindParam(3, $email, \PDO::PARAM_STR);
            $requete->bindParam(4, $password, \PDO::PARAM_STR);
            $requete->bindParam(5, $id_roles, \PDO::PARAM_INT);
            $requete->execute();
        } catch (\Exception $e) {
            die('Error : ' . $e->getMessage());
        }
    }
    public function getUtilisateurByMail(): Utilisateur|bool
    {
        try {
            $mail = $this->email_utilisateur;
            $requete = $this->connexion()->prepare(
                'SELECT id_utilisateur,nom_utilisateur,prenom_utilisateur,email_utilisateur,telephone_utilisateur,password_utilisateur 
                FROM utilisateur
                WHERE email_utilisateur = ?'
            );
            $requete->bindParam(1, $mail, \PDO::PARAM_STR);
            $requete->execute();
            $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Utilisateur::class);
            return $requete->fetch();
        } catch (\Exception $e) {
            die('Error : ' . $e->getMessage());
        }
    }
    public function __toString(): string
    {
        return $this->nom_utilisateur;
    }
    public function getUtilisateurById(): Utilisateur|bool
    {
        try {
            $id = $this->id_utilisateur;
            $requete = $this->connexion()->prepare(
                'SELECT id_utilisateur,nom_utilisateur,prenom_utilisateur,email_utilisateur,telephone_utilisateur,password_utilisateur 
                FROM utilisateur
                WHERE id_utilisateur = ?'
            );
            $requete->bindParam(1, $id, \PDO::PARAM_STR);
            $requete->execute();
            $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Utilisateur::class);
            return $requete->fetch();
        } catch (\Exception $e) {
            die('Error : ' . $e->getMessage());
        }
    }
}

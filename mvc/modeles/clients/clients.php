<?php

include_once "./include/config.php";
class Modele_clients {
    public $id;
    public $nom;
    public $prenom;
    public $telephone;
    public $adresse;
    public $ville;
    public $code_postal;
    public $province;
    public $pays;

    public function __construct($id, $nom, $prenom, $telephone, $adresse, $ville, $code_postal, $province, $pays) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephone = $telephone;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->code_postal = $code_postal;
        $this->province = $province;
        $this->pays = $pays;
    }

    public static function connecter() {
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);
        if($mysqli->connect_errno) {
            echo "Echec de la connexion";
        }
        else {
            // echo "Connexion reussie";
        }

        return $mysqli;
    }

    public static function obtenirTous() {
        $mysqli = self::connecter();
        $clients = [];

        $res = $mysqli->query("SELECT * FROM proprietaires ORDER BY id") ;

        foreach ($res as $enregistrement) {
            $clients[] = new Modele_clients($enregistrement["id"], $enregistrement["nom"], $enregistrement["prenom"], $enregistrement["telephone"], $enregistrement["adresse"], $enregistrement["ville"], $enregistrement["code_postal"], $enregistrement["province"], $enregistrement["pays"]);
        }

        $mysqli->close();

        return $clients;
    }

    public static function obtenirUn($id) {
        $client = null;
        $mysqli = self::connecter();
        if($requete = $mysqli->prepare("SELECT * from proprietaires WHERE id=?")) {
            $requete->bind_param("i", $id);
            $requete->execute();
            $res = $requete->get_result();
            if($enregistrement = $res->fetch_assoc()) {
                $client = new Modele_clients($enregistrement["id"], $enregistrement["nom"], $enregistrement["prenom"], $enregistrement["telephone"], $enregistrement["adresse"], $enregistrement["ville"], $enregistrement["code_postal"], $enregistrement["province"], $enregistrement["pays"]);
            }
            else {
                echo "Aucun client correspondant.";
            }
        };

        $mysqli->close();

        return $client;
    }

    public static function ajouter($prenom, $nom, $telephone, $adresse, $ville, $code_postal, $province, $pays) {
        $mysqli = self::connecter();
        if($requete = $mysqli->prepare("INSERT INTO proprietaires(prenom, nom, telephone, adresse, ville, code_postal, province, pays) VALUES(?,?,?,?,?,?,?,?)")) {
            $requete->bind_param("ssssssss", $prenom, $nom, $telephone, $adresse, $ville, $code_postal, $province, $pays);
            if($requete->execute()) {
                $message = "Client ajoute avec succes.";
            } else {
                $message =  "Une erreur est survenue lors de l'ajout.";
            }
        } else {
            echo "Une erreur a été détectée dans la requête utilisée."; 
            exit();
        }
        $requete->close();
        $mysqli->close();
        return $message;
    }

    public static function editer($id, $prenom, $nom, $telephone, $adresse, $ville, $code_postal, $province, $pays) {
        $mysqli = self::connecter();

        if($requete = $mysqli->prepare("UPDATE proprietaires SET prenom=?, nom=?, telephone=?, adresse=?, ville=?, code_postal=?, province=?, pays=? WHERE id=?")) {
            $requete->bind_param("ssssssssi", $prenom, $nom, $telephone, $adresse, $ville, $code_postal, $province, $pays, $id);
            if($requete->execute()) {
                $message = "Client mis a jour avec succes.";
            } else {
                $message =  "Une erreur est survenue lors de la mise a jour.";
            }
        } else {
            echo "Une erreur a été détectée dans la requête utilisée."; 
            exit();
        }
        $requete->close();
        $mysqli->close();
        return $message;
    }

    public static function supprimer($id) {
        $mysqli = self::connecter();

        if($requete = $mysqli->prepare("DELETE FROM proprietaires WHERE id=?")) {
            $requete->bind_param("i", $id);
            if($requete->execute()) {
                $message = "Client supprime.";
            } else {
                $message =  "Une erreur est survenue lors de la suppression.";
            }
        } else {
            echo "Une erreur a été détectée dans la requête utilisée."; 
            exit();
        }
        $requete->close();
        $mysqli->close();
        return $message;
    }
}

?>
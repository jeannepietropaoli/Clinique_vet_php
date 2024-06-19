<?php

require_once "./include/config.php";

class Modele_animal {
    public $id;
    public $nom_animal;
    public $date_de_naissance;
    public $type;
    public $prenom_proprio;
    public $nom_proprio;

    public function __construct($id, $nom_animal, $date_de_naissance, $type, $prenom_proprio, $nom_proprio) {
        $this->id = $id;
        $this->nom_animal = $nom_animal;
        $this->date_de_naissance = $date_de_naissance;
        $this->type = $type;
        $this->prenom_proprio = $prenom_proprio;
        $this->nom_proprio = $nom_proprio;
    }

    static function connecter() {
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

        if($mysqli->connect_errno) {
            echo "Echec de la connexion";
            exit();
        }else {
            // echo "Connexion reussie";
        }

        return $mysqli;
    }

    public static function obtenirTous() {
        $enregistrements = [];
        $mysqli = self::connecter();

        $res = $mysqli->query("SELECT animaux.id, animaux.nom AS nom_animal, date_de_naissance, type, proprietaires.prenom AS prenom_proprio, proprietaires.nom AS nom_proprio FROM animaux INNER JOIN types ON animaux.fk_type = types.id INNER JOIN proprietaires ON animaux.fk_proprietaire = proprietaires.id");
    
        foreach ($res as $enregistrement) {
            $enregistrements[] = new Modele_animal($enregistrement["id"], $enregistrement["nom_animal"], $enregistrement["date_de_naissance"], $enregistrement["type"], $enregistrement["prenom_proprio"], $enregistrement["nom_proprio"]);
        }

        return $enregistrements;
    }

    public static function obtenirUn($id) {
        $mysqli = self::connecter();
        $animal = null;

        if($requete = $mysqli->prepare("SELECT animaux.id, animaux.nom AS nom_animal, date_de_naissance, type, proprietaires.prenom AS prenom_proprio, proprietaires.nom AS nom_proprio FROM animaux INNER JOIN types ON animaux.fk_type = types.id INNER JOIN proprietaires ON animaux.fk_proprietaire = proprietaires.id WHERE animaux.id=?")) {
            $requete->bind_param("i", $id);
            $requete->execute();
            $result = $requete->get_result();
            if($enregistrement = $result->fetch_assoc()) {  // recupere le seul enregistrement du tableau $result (ou null si rien)
                $animal = new Modele_animal($enregistrement["id"], $enregistrement["nom_animal"], $enregistrement["date_de_naissance"], $enregistrement["type"], $enregistrement["prenom_proprio"], $enregistrement["nom_proprio"]);
            }
            else {
                echo "Aucun enregistrement trouve.";
            }
            $requete->close();
        } else {
            echo "Une erreur a été détectée dans la requête utilisée";
             echo $mysqli->error;
        }
        $mysqli->close();
    
        return $animal;
    }
}
?>
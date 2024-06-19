<?php 
    require_once("./include/config.php");

class Modele_veterinaires {
    public $id ;
    public $nom;
    public $prenom;

    public function __construct($id, $nom, $prenom) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }
    public static function connecter() {
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);
        if($mysqli->connect_errno){
            echo "Echec de la connexion";
            exit();
        } else {
            // echo "Connexion reussie";
        }

        return $mysqli;
    }

    public static function ObtenirTous() {
        $enregistrements = [];
        $mysqli = self::connecter();

        $res = $mysqli->query("SELECT id, nom, prenom FROM veterinaires ORDER BY nom, prenom");

        foreach($res as $enregistrement) {
            $enregistrements[] = new Modele_veterinaires($enregistrement["id"], $enregistrement["nom"], $enregistrement["prenom"]);
        }

        return $enregistrements;
    }

    public static function ObtenirUn($id) {
        $veterinaire = null;
        $mysqli = self::connecter();

        if($requete = $mysqli->prepare("SELECT  id, nom, prenom FROM veterinaires WHERE id=?")) {
            $requete->bind_param("i", $id);
            $requete->execute();
            $res = $requete->get_result();
            if($enregistrement = $res->fetch_assoc()) {
                $veterinaire = new Modele_veterinaires($enregistrement["id"], $enregistrement["nom"], $enregistrement["prenom"]);
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

        return $veterinaire;
    }
}
?>
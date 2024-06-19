<?php 

include_once "./include/config.php";

class Modele_rdvs {
    public $id;
    public $date;
    public $duree;
    public $raison;
    public $animal;
    public $veterinaire_prenom;
    public $veterinaire_nom;

    public function __construct($id, $date, $duree, $raison, $animal, $veterinaire_prenom, $veterinaire_nom) {
        $this->id= $id;
        $this->date= $date;
        $this->duree= $duree;
        $this->raison= $raison;
        $this->animal= $animal;
        $this->veterinaire_prenom = $veterinaire_prenom;
        $this->veterinaire_nom = $veterinaire_nom;
    }

    static function connecter() {
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);
        if($mysqli->connect_errno) {
            echo "Erreur de connexion";
        } else {
            // echo "Connexion reussie !";
        }
        return $mysqli;
    }

    public static function ObtenirTous() {
        $enregistrements = [];
        $mysqli = self::connecter();
        $res = $mysqli->query("SELECT rdvs.id AS id, date_rdv, duree, raison, animaux.nom AS animal, veterinaires.nom AS veterinaire_nom, veterinaires.prenom AS veterinaire_prenom FROM rdvs INNER JOIN animaux ON rdvs.fk_animal = animaux.id INNER JOIN veterinaires ON rdvs.fk_veterinaire = veterinaires.id");
        while($enregistrement = $res->fetch_assoc()) {
            $enregistrements[] = new Modele_rdvs($enregistrement["id"], $enregistrement["date_rdv"], $enregistrement["duree"], $enregistrement["raison"], $enregistrement["animal"], $enregistrement["veterinaire_prenom"], $enregistrement["veterinaire_nom"]);
        }
        return $enregistrements;
    }

    public static function ObtenirUn($id) {
        $rdv = null;
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT rdvs.id AS id, date_rdv, duree, raison, animaux.nom AS animal, veterinaires.nom AS veterinaire_nom, veterinaires.prenom AS veterinaire_prenom FROM rdvs INNER JOIN animaux ON rdvs.fk_animal = animaux.id INNER JOIN veterinaires ON rdvs.fk_veterinaire = veterinaires.id WHERE rdvs.id = ?")){
            $requete->bind_param("i", $id);
            $requete->execute();
            $res = $requete->get_result();
    
            if($enregistrement = $res->fetch_assoc()) {
                $rdv = new Modele_rdvs($enregistrement["id"], $enregistrement["date_rdv"], $enregistrement["duree"], $enregistrement["raison"], $enregistrement["animal"], $enregistrement["veterinaire_prenom"], $enregistrement["veterinaire_nom"]);
            } 

            $requete->close();
        } else {
            echo "Une erreur a été détectée dans la requête utilisée";
        }

        $mysqli->close();

        return $rdv;
    }
}   

?>
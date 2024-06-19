<?php

require_once "./mvc/modeles/rdv/rdvs.php";

class Controlleur_rdvs {
    public static function afficherTableau() {
        $rdvs = Modele_rdvs::ObtenirTous();
        require "./mvc/view/rdv/tableau.php";
    }

    public static function afficherFicheRdv() {
        if(isset($_GET["id"])) {
            $rdv = Modele_rdvs::ObtenirUn($_GET["id"]);
            if($rdv) {
                require "./mvc/view/rdv/fiche.php";
            } else {
                echo "ID fourni ne correspond a aucun rdv.";
            }
        }else {
            echo "ID manquant";
        }
    }
}

?>
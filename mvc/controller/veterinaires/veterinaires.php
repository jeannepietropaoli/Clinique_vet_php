<?php
    require_once("./mvc/modeles/veterinaires/veterinaires.php");

    class Controlleur_veterinaires {
        public static function afficherCards() {
            $veterinaires = Modele_veterinaires::obtenirTous();
            require "./mvc/view/veterinaires/cards.php";
        }

        public static function afficherFicheVeterinaire() {
            if(isset($_GET["id"])) {
                $veterinaire = Modele_veterinaires::obtenirUn($_GET["id"]);
                if($veterinaire) {
                    require "./mvc/view/veterinaires/fiche.php";
                }
                else {
                    $erreur = "Aucun veterinaire ne correspond a la recherche.";
                    echo "erreur";
                }
            } else {
                $erreur = "ID manquant.";
                echo $erreur;
            }
        }
    }
?>

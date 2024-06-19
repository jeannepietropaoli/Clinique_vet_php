<?php

    require_once "./mvc/modeles/animaux/animaux.php";

    class Controlleur_animaux {
        public static function afficherListe() {
            $animaux = Modele_animal::obtenirTous();
            require "./mvc/view/animaux/liste.php";
        }

        public static function afficherTableau() {
            $animaux = Modele_animal::obtenirTous();
            require "./mvc/view/animaux/tableau.php";
        }

        public static function afficherTableauAvecBoutonsAction() {
            $animaux = Modele_animal::obtenirTous();
            require "./mvc/view/animaux/tableauAvecBoutonsAction.php";
        }

        public static function afficherFicheAnimal() {
            if(isset($_GET["id"])) {
                $animal = Modele_animal::obtenirUn($_GET["id"]);
                if($animal) {
                    require './mvc/view/animaux/fiche.php';
                } else {
                    $erreur = "Aucun produit trouvé";
                }
            } else {
                $erreur = "L'identifiant (id) du produit à afficher est manquant dans l'url";
            }
        }
    }
?>
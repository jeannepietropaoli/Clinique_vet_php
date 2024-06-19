<?php

include_once "./mvc/modeles/clients/clients.php";
class Controlleur_clients {
    public static function afficherListe() {
        $clients = Modele_clients::obtenirTous();
        require "./mvc/view/clients/liste.php";
    }

    public static function afficheFicheClient() {
        if(isset($_GET["id"])) {
            $client = Modele_clients::obtenirUn(($_GET["id"]));
            if($client) {
                require "./mvc/view/clients/fiche.php";
            }
            else {
                echo "Aucun client correspondant.";
            }
        } else {
            echo "ID manquant";
        }
    }

    public static function afficherFormulaireEdition() {
        if(isset($_GET["id"])) {
            $client = Modele_clients::obtenirUn($_GET["id"]);
            if($client) {
                require "./mvc/view/clients/formulaire_mise_a_jour_client.php";
            }
            else {
                echo "Aucun client correspondant.";
            }
        } else {
            echo "ID manquant";
        }
    }

    public static function afficherFicheSuppresion() {
        if(isset($_GET["id"])) {
            $client = Modele_clients::obtenirUn($_GET["id"]);
            if($client) {
                require "./mvc/view/clients/suppression_client.php";
            }
        } else {
            echo "ID manquant";
        }
    }

    public static function ajouter() {
        if(isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["telephone"]) && isset($_POST["adresse"]) && isset($_POST["ville"]) && isset($_POST["code_postal"]) && isset($_POST["province"]) && isset($_POST["pays"])) {
            $message = Modele_clients::ajouter($_POST["prenom"], $_POST["nom"], $_POST["telephone"], $_POST["adresse"], $_POST["ville"], $_POST["code_postal"], $_POST["province"], $_POST["pays"]);
            echo $message;
        } else {
            echo "Veuillez renseigner tous les champs.";
        }
    }

    public static function editer() {
        if(isset($_GET["id"]) && isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["telephone"]) && isset($_POST["adresse"]) && isset($_POST["ville"]) && isset($_POST["code_postal"]) && isset($_POST["province"]) && isset($_POST["pays"])) {
            $message = Modele_clients::editer($_GET["id"], $_POST["prenom"], $_POST["nom"], $_POST["telephone"], $_POST["adresse"], $_POST["ville"], $_POST["code_postal"], $_POST["province"], $_POST["pays"]);
            echo $message;
        } else {
            echo "Veuillez renseigner tous les champs.";
        }
    }

    public static function supprimer() {
        if(isset($_GET["id"])) {
            $message = Modele_clients::supprimer(($_GET["id"]));
            echo $message;
        } else {
            echo "ID manquant";
        }
    }
}

?>
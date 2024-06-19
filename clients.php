<?php 
    include_once "mvc/controller/clients/clients.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinique veterinaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/c777fc19af.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body class="p-0 text-center w-full">
    <header class="shadow-md w-full">
        <nav>
            <ul class="text-left ml-8 flex items-center">
                <a href="index.php"><i class="fa-solid fa-shield-dog inline-block text-5xl mr-5 hover:cursor-pointer"></i></a>
                <li class="inline-block mr-6 p-5 border-b-4 border-transparent hover:cursor-pointer"><a href="index.php">Accueil</a></li>
                <li class="inline-block mr-6 p-5 border-b-4 border-transparent hover:cursor-pointer"><a href="veterinaires.php">Veterinaires</a></li>
                <li class="inline-block mr-6 p-5 border-b-4 border-transparent hover:cursor-pointer"><a href="animaux.php">Animaux</a></li>
                <li class="inline-block mr-6 p-5 border-b-4 border-transparent hover:cursor-pointer"><a href="rendez_vous.php">Rendez-vous</a></li>
                <li class="inline-block mr-6 p-5 border-b-4 border-transparent hover:cursor-pointer"><a href="ajout_client.php">Ajout client</a></li>
                <li class="inline-block mr-6 p-5 border-b-4 hover:cursor-pointer border-indigo-700"><a href="clients.php">Clients</a></li>
            </ul>
        </nav>
    </header>
    <h1 class="font-bold text-5xl m-9">Clinique GlobalVet</h1>
    <p>Voici la liste de nos clients:</p>
    <button class="py-3 px-5 bg-gray-100 m-3 hover:bg-gray-300"><a href="ajout_client.php">Ajouter un client</a></button>

    <?php 
        $controlleur_clients = new Controlleur_clients();
        $controlleur_clients->afficherListe();
    ?>
</body>
</html>
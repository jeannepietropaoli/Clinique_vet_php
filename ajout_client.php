<?php
    include_once "./mvc/controller/clients/clients.php";
    
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
                <li class="inline-block mr-6 p-5 border-b-4 border-indigo-700 hover:cursor-pointer"><a href="ajout_client.php">Ajout client</a></li>
                <li class="inline-block mr-6 p-5 border-b-4 border-transparent hover:cursor-pointer"><a href="clients.php">Clients</a></li>
            </ul>
        </nav>
    </header>
    <h1 class="font-bold text-5xl m-9">Clinique GlobalVet</h1>
    <p>Pour ajouter un client, c'est facile ! Remplissez simplement le formulaire suivant.</p>

    <form action="" method="POST">
        <div class="input-control flex flex-col w-2/5 m-auto min-w-64">
            <label for="prenom">Prenom</label>
            <input class="border-2 border-t-slate-200 m-2" type="text" id="prenom" name="prenom" min="2" max="25" required>
        </div>
        <div class="input-control flex flex-col w-2/5 m-auto min-w-64">
            <label for="nom">Nom</label>
            <input class="border-2 border-t-slate-200 m-2" type="text" id="nom" name="nom" min="2" max="25" required>
        </div>
        <div class="input-control flex flex-col w-2/5 m-auto min-w-64">
            <label for="telephone">Telephone</label>
            <input class="border-2 border-t-slate-200 m-2" type="tel" id="telephone"  name="telephone" required>
        </div>
        <div class="input-control flex flex-col w-2/5 m-auto min-w-64">
            <label for="adresse">Adresse</label>
            <input class="border-2 border-t-slate-200 m-2" type="text" id="adresse" name="adresse" min="2" max="50" required>
        </div>
        <div class="input-control flex flex-col w-2/5 m-auto min-w-64">
            <label for="ville">Ville</label>
            <input class="border-2 border-t-slate-200 m-2" type="text" id="ville" name="ville" min="2" max="25" required>
        </div>
        <div class="input- flex flex-col w-2/5 m-auto min-w-64">
            <label for="code_postal">Code postal</label>
            <input class="border-2 border-t-slate-200 m-2" m-2 type="text" id="code_postal" name="code_postal" required>
        </div>
        <div class="input- flex flex-col w-2/5 m-auto min-w-64">
            <label for="ville">Province</label>
            <input class="border-2 border-t-slate-200 m-2" m-2 type="text" id="province" name="province" required>
        </div>
        <div class="input-control flex flex-col w-2/5 m-auto min-w-64">
            <label for="pays">Pays</label>
            <select class="border-2 border-t-slate-200 m-2" name="pays" id="pays" required>
                <option value="Canada">Canada</option>
                <option value="France">France</option>
                <option value="Etats-Unis">Etats-Unis</option>
            </select>
        </div>
        <button name="ajoutBtn" type="submit">Ajouter</button>
    </form>

    <?php
        $controlleur_clients = new Controlleur_clients();
        $controlleur_clients->ajouter()
    ?>
</body>
</html>
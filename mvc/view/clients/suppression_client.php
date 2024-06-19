<div class='p-7 space-y-2 border-2 my-3 hover:bg-slate-100'>Client #<?=$client->id?>
            <p><?=$client->prenom . " " . $client->nom?></p>
            <p><?=$client->telephone?></p>
            <p><?=$client->adresse?></p>
            <p><?=$client->ville?></p>
            <p><?=$client->code_postal?></p>
            <p><?=$client->province?></p>
            <p><?=$client->pays?></p>
        </div>

<form method="POST" class='p-7 space-y-2 border-2 my-3 hover:bg-slate-100'>
    <p>Etes-vous vraiment sur de vouloir supprimer ce client?</p>
    <button class="px-5 py-3 bg-gray-100 hover:bg-gray-300" type="submit">Oui</button>
    <button class="px-5 py-3 bg-gray-100 hover:bg-gray-300"><a href="clients.php">Non</a></button>
</form>
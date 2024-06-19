<h2>Affichage des clients en mode liste</h2>

<ul class="m-6">
    <?php
        foreach ($clients as $client) {
    ?> 

        <div class='p-7 space-y-2 border-2 my-3 hover:bg-slate-100'>Client #<?=$client->id?>
            <p><?=$client->prenom . " " . $client->nom?></p>
            <p><?=$client->telephone?></p>
            <p><?=$client->adresse?></p>
            <p><?=$client->ville?></p>
            <p><?=$client->code_postal?></p>
            <p><?=$client->province?></p>
            <p><?=$client->pays?></p>
            <button class="py-3 px-5 bg-gray-100 m-3 hover:bg-gray-300"><a href="fiche_client.php?id=<?=$client->id?>">Details</a></button>
            <button class="py-3 px-5 bg-gray-100 m-3 hover:bg-gray-300"><a href="mise_a_jour_client.php?id=<?=$client->id?>">Editer</a></button>
            <button class="py-3 px-5 bg-gray-100 m-3 hover:bg-gray-300"><a href="supression_client.php?id=<?=$client->id?>">Supprimer</a></button>
        </div>

    <?php } ?>
</ul>
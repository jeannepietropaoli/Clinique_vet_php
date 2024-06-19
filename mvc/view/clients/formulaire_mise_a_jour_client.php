<form action="" method="POST">
    <div class="input-control flex flex-col w-2/5 m-auto min-w-64">
        <label for="prenom">Prenom</label>
        <input class="border-2 border-t-slate-200 m-2" type="text" id="prenom" name="prenom" min="2" max="25" value=<?=$client->prenom?> required>
    </div>
    <div class="input-control flex flex-col w-2/5 m-auto min-w-64">
        <label for="nom">Nom</label>
        <input class="border-2 border-t-slate-200 m-2" type="text" id="nom" name="nom" min="2" max="25" value=<?=$client->nom?> required>
    </div>
    <div class="input-control flex flex-col w-2/5 m-auto min-w-64">
        <label for="telephone">Telephone</label>
        <input class="border-2 border-t-slate-200 m-2" type="tel" id="telephone"  name="telephone" value=<?=$client->telephone?> required>
    </div>
    <div class="input-control flex flex-col w-2/5 m-auto min-w-64">
        <label for="adresse">Adresse</label>
        <input class="border-2 border-t-slate-200 m-2" type="text" id="adresse" name="adresse" min="2" max="50" value=<?=$client->adresse?> required>
    </div>
    <div class="input-control flex flex-col w-2/5 m-auto min-w-64">
        <label for="ville">Ville</label>
        <input class="border-2 border-t-slate-200 m-2" type="text" id="ville" name="ville" min="2" max="25" value=<?=$client->ville?> required>
    </div>
    <div class="input- flex flex-col w-2/5 m-auto min-w-64">
        <label for="code_postal">Code postal</label>
        <input class="border-2 border-t-slate-200 m-2" m-2 type="text" id="code_postal" name="code_postal" value=<?=$client->code_postal?> required>
    </div>
    <div class="input- flex flex-col w-2/5 m-auto min-w-64">
        <label for="ville">Province</label>
        <input class="border-2 border-t-slate-200 m-2" m-2 type="text" id="province" name="province" value=<?=$client->province?> required>
    </div>
    <div class="input-control flex flex-col w-2/5 m-auto min-w-64">
        <label for="pays">Pays</label>
        <select class="border-2 border-t-slate-200 m-2" name="pays" id="pays" value=<?=$client->pays?> required>
            <option value="Canada">Canada</option>
            <option value="France">France</option>
            <option value="Etats-Unis">Etats-Unis</option>
        </select>
    </div>
    <button name="ajoutBtn" type="submit">Valider</button>
</form>
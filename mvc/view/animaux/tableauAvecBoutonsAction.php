<h2>Affichage des animaux en mode tableau avec boutons d'action</h2>

<table class="my-6 m-auto border-collapse border border-slate-400">
    <thead>
        <tr>
            <th class="border border-slate-400 p-4">Animal</th>
            <th class="border border-slate-400 p-4">Type</th>
            <th class="border border-slate-400 p-4">Date de naissance</th>
            <th class="border border-slate-400 p-4">Proprietaire</th>
            <th class="border border-slate-400 p-4">Actions</th>
        </tr>
    </thead>
    <?php
        foreach($animaux as $animal) {
            echo (
                "<tr>
                    <td class='border border-slate-400 p-4'>{$animal->nom_animal}</td>
                    <td class='border border-slate-400 p-4'>{$animal->type}</td>
                    <td class='border border-slate-400 p-4'>{$animal->date_de_naissance}</td>
                    <td class='border border-slate-400 p-4'>{$animal->prenom_proprio} {$animal->nom_proprio}</td>
                    <td class='border border-slate-400 p-4'>
                        <button class='border-2 border-gray-300 p-3 hover:bg-slate-200'><a href='fiche_animal.php?id={$animal->id}'>Afficher</a></button>
                        <button class='border-2 border-gray-300 p-3 hover:bg-slate-200'><a href='fiche_animal.php?id={$animal->id}'>Modifier</a></button>
                        <button class='border-2 border-gray-300 p-3 hover:bg-slate-200'><a href='fiche_animal.php?id={$animal->id}'>Supprimer</a></button>
                    </td>
                </tr>"
            );
        }
    ?>
</table>
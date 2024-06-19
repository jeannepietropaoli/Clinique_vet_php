<table class="my-6 m-auto border-collapse border border-slate-400">
        <thead>
            <tr>
                <th class="border border-slate-400 p-4">Rdv ID</th>
                <th class="border border-slate-400 p-4">Date</th>
                <th class="border border-slate-400  p-4">Duree</th>
                <th class="border border-slate-400  p-4">Raison</th>
                <th class="border border-slate-400  p-4">Animal</th>
                <th class="border border-slate-400  p-4">Veterinaire</th>
                <th class="border border-slate-400 p-4">Actions</th>
            </tr>
        </thead>

    <?php
        foreach($rdvs as $rdv) {
    ?>
            <tr>
                <td class='border border-slate-400 p-4'><?=$rdv->id?></td>
                <td class='border border-slate-400 p-4'><?=$rdv->date?></td>
                <td class='border border-slate-400 p-4'><?=$rdv->duree?></td>
                <td class='border border-slate-400 p-4'><?=$rdv->raison?></td>
                <td class='border border-slate-400 p-4'><?=$rdv->animal?></td>
                <td class='border border-slate-400 p-4'><?=$rdv->veterinaire_prenom . " " . $rdv->veterinaire_nom?></td>
                <td class='border border-slate-400 p-4'><button><a href="fiche_rdv.php?id=<?=$rdv->id?>"></a>Details</button></td>
            </tr>

    <?php } ?>

    </table>
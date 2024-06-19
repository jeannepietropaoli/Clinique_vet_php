<h2>Affichage des animaux en mode liste</h2>

<ul class="m-6">
    <?php
    foreach ($animaux as $animal) {
        echo "<li class='mb-5'>{$animal->nom_animal} ({$animal->type}) - ne le {$animal->date_de_naissance}. Proprietaire: {$animal->prenom_proprio} {$animal->nom_proprio}</li>";
    }
    ?>
</ul>
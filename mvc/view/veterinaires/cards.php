<?php
    foreach($veterinaires as $veterinaire) {
        echo (
            "<div class='p-7 space-y-2 border-2 my-3 hover:bg-slate-100'>
                <i class='fa-solid fa-id-card-clip text-2xl bg-gray-400 p-4 rounded-full' ></i>
                <p>{$veterinaire->prenom}</p>
                <p>{$veterinaire->nom}</p>
                <button><a href='fiche_veterinaire.php?id={$veterinaire->id}'>Details</a></button>
            </div>"
        );
    }
?>
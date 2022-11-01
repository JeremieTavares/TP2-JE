<!-- CE FICHIER PROCÈDE À L'AFFICHAGE DES COMMENTAIRES EN RÉPONSE À UNE REQUÊTE "FETCH()" OU AJAX -->

<!-- À RÉPÉTER POUR CHAQUE COMMENTAIRE-->

    
<?php
        foreach ($tblComments as $value) {
    ?>

    <div>
        <h4>Client : <?php echo $value->get_pseudo() ?></h4>                
        <p>Classement : <?php echo $value->get_classement() ?></p>
        <p>Commentaire : <?php echo $value->get_commentaire() ?></p>
        <hr />
    </div>

    <?php
        }
    ?>
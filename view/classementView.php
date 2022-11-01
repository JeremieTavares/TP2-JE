<?php
$title = 'Classements';
ob_start();
?>

<h1>Les classements</h1>

<?php foreach ($campingArray as $campingObj) { ?>
    <!-- À RÉPÉTER POUR CHAQUE CAMPING -->
    <h3>Camping : <?= $campingObj->get_nom() ?></h3>

    <div class="flex">
        <div class="w50">
            <p>Ville : <?= $campingObj->get_ville() ?> </p>
            <p>Classement : <?= $campingObj->get_classementMoyen() ?> </p>

            <div class="commentaireCamping">
                <!-- AJAX COMMENTAIRES DU CAMPING -->
            </div>

            <button onclick="showComments(this)" id="bouton-<?= $campingObj->get_id(); ?>">Afficher commentaire</button>
        </div>

        <!-- EMPÊCHER UTILISATEUR NON AUTHENTIFIÉ D'ACCÉDER AU FORMULAIRE -->

        <?php if (isset($_SESSION['user'])) { ?>
            <div class="w50">
                <!-- AJOUTEZ ATTRIBUTS AU FORMULAIRE POUR IDENTIFIER LE CAMPING CONCERNÉ -->
                <form action="index.php" method="post">
                    <label for="classement">Classement : </label>
                    <input type="number" name="classement" id="classement" min="0" max="5" />

                    <label for="commentaire">Commentaire : </label>
                    <textarea name="commentaire" id="commentaire"></textarea>

                    <input type="hidden" name="idCamping" value="<?= $campingObj->get_id() ?>" />
                    <input type="hidden" name="action" value="addComment" />

                    <button type="submit" class="submitComment">Envoyer</button>
                </form>
            </div>
        <?php } ?>
    </div>

    <hr />
<?php
}
$content = ob_get_clean();

require('template.php');
?>
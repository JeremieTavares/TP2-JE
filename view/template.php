<!DOCTYPE html>
<html lang="fr-ca">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="inc/css/style.css" rel="stylesheet" /> 
        <script src="inc/js/script.js" defer></script>
        <title><?= $title; ?></title>
    </head>

    <body>
        <pre>
            - - - - SESSION PHP - - - -<br />
            <?php print_r($_SESSION); ?>
            - - - - - - - - - - - - - -
        </pre>

        <nav>
            <ul>
                <li><a href="index.php">Les classements</a></li>

                <!-- MODIFIER LIEN EN FONCTION QUE L'UTILISATEUR EST CONNECTÉ OU NON -->
                    <li><a href="index.php?action=<?php echo((isset($_SESSION['user']['id']) ? "logout" : "login")); ?>"><?php echo((isset($_SESSION['user']['id']) ? "Se deconnecter" : "Se connecter")); ?></a></li>
            </ul>
        </nav>

        <?= $content; ?>
    </body>
</html>


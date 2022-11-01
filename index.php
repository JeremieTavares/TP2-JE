<?php
    if(session_status() === PHP_SESSION_NONE)
        session_start();

    $fetchRequest = json_decode(file_get_contents('php://input'), true);

    if (isset($_REQUEST['action'])) {
        // Formulaire de connexion
        if($_REQUEST['action'] === 'login') {
            require_once('./controller/controllerClient.php');
            getFormConnection();
        }

        // Authentification
        else if($_REQUEST['action'] === 'authenticate') {
            require_once('./controller/controllerClient.php');
            authenticate($_REQUEST['pseudo'], $_REQUEST['mdp']);
            require_once('./controller/controllerCamping.php');
            afficherCamping();
        }

        // Déconnexion
        else if($_REQUEST['action'] === 'logout') {
            $_SESSION = [];
            session_destroy();
            require_once('./controller/controllerCamping.php');
            afficherCamping();
        }

        // Get Commentaires d'un camping (AJAX)
        else if($_REQUEST['action'] === 'getComments') {

        }

        // Ajouter un commentaire
        else if($_REQUEST['action'] === 'addComment') {
            if(isset($_SESSION["user"]['id'])) {
                require_once("./controller/controllerCommentaire.php");
                if(isset($_REQUEST["commentaire"]))
                    addComment($_SESSION['user']['id']);
            }
            require_once('./controller/controllerCamping.php');
            afficherCamping();
        }     
    }   

    else if(isset($fetchRequest["action"]) && $fetchRequest["action"] == 'getComments') {
        require_once("./controller/controllerCommentaire.php");
        getComments($fetchRequest["id"]);
        exit();
    }

    else {
        require_once('./controller/controllerCamping.php');
        afficherCamping();
    }
?>
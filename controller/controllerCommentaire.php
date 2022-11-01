<?php 
    require_once('model/CommentaireManager.php');


    function getComments($idCamping) {
        $comManager = new CommentaireManager;
        $tblComments = $comManager->getCommentsById($idCamping);

        if(count($tblComments) > 0) {

            http_response_code(200);
            require_once("./view/commentairesCampingView.php");
           

        }
        else {
            http_response_code(400);
            echo 'Aucun commentaire pour ce camping';
        }

    }

    function addComment($idClient) {
        $commentaire = new Commentaire(
            array(
                "pseudo"=>$idClient, 
                "classement"=>$_REQUEST["classement"], 
                "commentaire"=>$_REQUEST["commentaire"], 
                "camping"=>$_REQUEST["idCamping"])
    );

        echo($commentaire->get_commentaire());

        $comManager = new CommentaireManager;
        $comManager->addCommentById($commentaire);

        unset($_REQUEST["commentaire"]);

    }

    
?>
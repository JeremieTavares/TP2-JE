<?php 
    require_once('model/ClientManager.php');

    function getFormConnection() {
        require_once("./view/loginView.php");
    }
    function authenticate($username, $password){
        $userManager = new ClientManager();
        $userArray = $userManager->VerifyUserInfo($username, $password);


        if($userArray != null){
            $_SESSION['user']['id'] = $userArray->get_id();
            $_SESSION['user']['pseuso'] = $userArray->get_pseudo();
        } else {     
            getFormConnection();
        }     
    }
?>
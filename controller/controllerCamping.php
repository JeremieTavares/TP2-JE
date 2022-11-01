<?php 
    require_once('model/CampingManager.php');
    

    function afficherCamping() {
        $campingManager = new CampingManager();
        $campingArray =  $campingManager->getCampings();

        require_once('view/classementView.php');
    }

    
    
?>
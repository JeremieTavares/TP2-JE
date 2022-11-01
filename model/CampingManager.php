<?php
require_once('model/Manager.php');
require_once('model/Camping.php');

class CampingManager extends Manager {
    const SELECT_ALL_CAMPINGS = "SELECT *, IFNULL((SELECT ROUND(AVG(classement), 2) FROM tbl_commentaire AS com
                                 WHERE cam.id = com.id_camping GROUP BY id_camping), 'N/A') AS classementMoyen
                                 FROM tbl_camping AS cam";


    public function getCampings() {
        $campingObjArray = array();

        $db = $this->dbConnect();
        $query = $db->query(self::SELECT_ALL_CAMPINGS);
        $dbResults = $query->fetchAll();

        foreach($dbResults as $camping){
            array_push($campingObjArray, new Camping($camping));
        }
        return $campingObjArray;
    }



};

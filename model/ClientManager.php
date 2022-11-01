<?php
    require_once('model/Manager.php');
    require_once('model/Client.php');

    class ClientManager extends Manager {
        const SELECT_USEFULL_USER_INFO = "SELECT * FROM tbl_client WHERE pseudo = :user";


        public function VerifyUserInfo($username, $password){
            
            $db = $this->dbConnect();
            $query = $db->prepare(self::SELECT_USEFULL_USER_INFO);
            $query->bindParam(':user', $username, PDO::PARAM_STR);
            $query->execute();
            $dbResult = $query->fetch();


           if(password_verify($password, $dbResult['mdp']))
             return new Client($dbResult);
        
           return null;
        }
    };
?>
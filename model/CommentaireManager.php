<?php
    require_once('model/Manager.php');
    require_once('model/Commentaire.php');

    class CommentaireManager extends Manager {

        const SELECT_COMMENTS_BY_ID_CAMPING = " SELECT co.id, co.classement, co.commentaire, cl.pseudo FROM tbl_commentaire co
                                                JOIN tbl_client cl ON cl.id = co.id_client
                                                JOIN tbl_camping ca ON ca.id = co.id_camping
                                                WHERE ca.id = :idCamping;";

        const INSERT_COMMENT_BY_ID = "  INSERT INTO tbl_commentaire (id_camping, id_client, classement, commentaire)
                                        VALUES (:camping, :client, :classement, :commentaire);";

        public function getCommentsById($idCamping) {
            $db = $this->dbConnect();

            $query = $db->prepare(self::SELECT_COMMENTS_BY_ID_CAMPING);
            $query->bindParam(":idCamping", $idCamping, PDO::PARAM_INT);
            $query->execute();
            $response = $query->fetchAll();
            
            $newArr = [];

            foreach ($response as $value) {
                array_push($newArr, new Commentaire($value));
            }

            return $newArr;
        }

        public function addCommentById(Commentaire $commentaire) {
            $db = $this->dbConnect();

            $query = $db->prepare(self::INSERT_COMMENT_BY_ID);
            $query->execute(array(
                ":camping"=>$commentaire->get_camping(),
                ":client"=>$commentaire->get_pseudo(),
                ":classement"=>$commentaire->get_classement(),
                ":commentaire"=>$commentaire->get_commentaire()
            ));
        }
    };
?>


<?php
class Camping
{

    private $_id,
            $_nom,
            $_ville,
            $_description,
            $_classementMoyen;

    public function __construct($params = array()) {
            foreach ($params as $key => $value) {

            $methodName = "set_" . $key;
                if (method_exists($this, $methodName)) {
                    $this->$methodName($value);
            }
        }
    }

    

    public function get_id() {return $this->_id;}
    public function get_nom() {return $this->_nom;}
    public function get_ville() {return $this->_ville;}
    public function get_description() {return $this->_description;}
    public function get_classementMoyen() {return $this->_classementMoyen;}


 
    public function set_id($id) {
        $this->_id = $id;
        return $this;
    }

    public function set_nom($nom) {
        $this->_nom = $nom;
        return $this;
    }
 

    public function set_ville($ville) {
        $this->_ville = $ville;
        return $this;
    }

    public function set_description($description) {
        $this->_description = $description;
        return $this;
    }

    public function set_classementMoyen($classement) {
        $this->_classementMoyen = $classement;
         return $this;
    }
};

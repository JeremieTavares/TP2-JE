<?php
   class Commentaire {
        
    private $_id;
    private $_pseudo;
    private $_classement;
    private $_commentaire;
    private $_camping;

    public function __construct($params = array()) {
        foreach ($params as $key => $value) {

            $methodName = "set_" . $key;
            if (method_exists($this, $methodName)) {
                 $this->$methodName($value);
                }
            }
        }


    
    public function get_pseudo()
    {
        return $this->_pseudo;
    }

    public function set_pseudo($_pseudo)
    {
        $this->_pseudo = $_pseudo;

        return $this;
    }

    
    public function get_classement()
    {
        return $this->_classement;
    }

    public function set_classement($_classement)
    {
        $this->_classement = $_classement;

        return $this;
    }

    
    public function get_commentaire()
    {
        return $this->_commentaire;
    }

    public function set_commentaire($_commentaire)
    {
        $this->_commentaire = $_commentaire;

        return $this;
    }


    public function get_id()
    {
            return $this->_id;
    }

    public function set_id($_id)
    {
            $this->_id = $_id;

            return $this;
    }


    public function get_camping()
    {
            return $this->_camping;
    }

    public function set_camping($_camping)
    {
            $this->_camping = $_camping;

            return $this;
    }
};
?>
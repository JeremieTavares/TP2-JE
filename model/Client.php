<?php
    class Client {
        private $_id,
                $_pseudo,
                $_courriel,
                $_mdp;

        public function __construct($params = array()) {
            foreach ($params as $key => $value) {
        
                $methodName = "set_" . $key;
                if (method_exists($this, $methodName)) {
                     $this->$methodName($value);
                    }
                }
            }

            

        public function get_id() {return $this->_id;}
        public function get_pseudo() {return $this->_pseudo;}
        public function get_courriel() {return $this->_courriel;}
        public function get_mdp() {return $this->_mdp;}


        public function set_id($id) {
                $this->_id = $id;

                return $this;
        }




          public function set_pseudo($pseudo) {
            $this->_pseudo = $pseudo;

            return $this;
          }
 



          public function set_courriel($courriel) {
            $this->_courriel = $courriel;

            return $this;
          }

 


          public function set_mdp($mdp) {
            $this->_mdp = $mdp;

            return $this;
            }
    };

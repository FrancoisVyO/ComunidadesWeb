<?php
    include_once("DBConexion.php");

    class ID{
        private $ID;
        public function set_Id($dato){
            $this->ID=$dato;
        }
        public function get_IDc() {
            return $this->ID;
        }
    }   
    
?>
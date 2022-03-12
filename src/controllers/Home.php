<?php
    class Home extends Controllers{
        public function default(){
            $this->view("home","home","",[]);
        }
        public function sayHi(){
            echo "hello ";
            echo $_SESSION['name'];
        }
        public function check(){
            $data = $_POST['demo'];
            echo $data;
        }
    }
?>
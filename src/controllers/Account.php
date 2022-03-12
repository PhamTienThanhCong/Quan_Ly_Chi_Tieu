<?php
    class Account extends Controllers{
        public function default(){
            $this->view("not_found","login","",[]);
        }
        public function login($data = []){
            $this->PerfectRoute($data);
            $this->view("login","","",[]);
        }
        public function Register(){

            $name = addslashes($_POST["name"]);
            $email = addslashes($_POST['email']);
            $password = addslashes($_POST['password']);

            if ($name == "" || $email == "" || $password == ""){
                die("-1");
            }

            $save = $this->model("User");

            if ($save->CreateUser($name,$email,$password)){
                echo 1;
            }else{
                echo 0;
            }
        }
        public function loginProcessing(){
            $email = addslashes($_POST['email']);
            $password = addslashes($_POST['password']);
            $remember = 0;
            if(isset($_POST['remember'])){
                $remember = 1;
            }
            
            $login = $this->model("User");

            if($login->loginUser($email,$password,$remember)){
                echo "1";
            }else{
                echo "0";
            }

        }
    }
?>
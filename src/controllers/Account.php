<?php
    class Account extends Controllers{
        public function default(){
            $this->view("not_found","login","",[]);
        }
        public function login($data = []){
            $this->PerfectRoute($data);
            $this->checkWasLogin();
            $this->view("login","","",[]);
        }
        public function Register(){

            $this->checkWasLogin();
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
            $this->checkWasLogin();

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
        function logout(){
            session_destroy();
            if(isset($_COOKIE['token'])){
                unset($_COOKIE['token']);
                setcookie('token', null, -1, '/');
            }
            $actual_link = "http://$_SERVER[HTTP_HOST]/Account/login";
            header("Location: $actual_link");
        }
    }
?>
<?php
    class account extends Controllers{
        public function default(){
            $this->view("not_found","login","",[]);
        }
        public function login($data = []){
            $this->PerfectRoute($data);
            $this->checkWasLogin();
            $this->view("login","","",[]);
        }
        public function register(){

            $this->checkWasLogin();
            if (isset($_POST["name"]) == false || isset($_POST["email"]) == false ||isset($_POST["password"]) == false){
                die("-1");
            }

            $name = addslashes($_POST["name"]);
            $email = addslashes($_POST['email']);
            $password = addslashes($_POST['password']);

            if ($name == "" || $email == "" || $password == ""){
                die("-1");
            }

            $secure_pass = password_hash($password, PASSWORD_BCRYPT);

            $save = $this->model("user");

            if ($save->CreateUser($name,$email,$secure_pass)){
                echo 1;
            }else{
                echo 0;
            }
        }
        public function login_processing(){
            $this->checkWasLogin();
            if (isset($_POST["email"]) == false ||isset($_POST["password"]) == false){
                die("0");
            }

            $email = addslashes($_POST['email']);
            $password = addslashes($_POST['password']);
            $remember = 0;
            if(isset($_POST['remember'])){
                $remember = 1;
            }
            
            $login = $this->model("user");

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
<?php
    class Controllers{
        protected function model($model){
            require_once "./src/models/". $model .".php";
            return new $model;
        }
        protected function view($template,$name_page,$view,$data=[]){
            $actual_link = "http://$_SERVER[HTTP_HOST]";
            require_once "./src/views/template/". $template .".php";
        }
        protected function PerfectRoute($data = []){
            if (count($data) > 1){
                $this->view("not_found","login","",[]);
                exit();
            }else if (count($data) == 1){
                if ($data[0] != ""){
                    $this->view("not_found","login","",[]);
                    exit();
                }
            }
        } 
        protected function checkLogin(){
            $actual_link = "http://$_SERVER[HTTP_HOST]/Account/login";
            $info = $this->model('user');
            $info->getInfoUser();
            
            if (isset($_SESSION['id']) == false){
                header("Location: $actual_link");
            }
        }
        protected function checkWasLogin(){
            $actual_link = "http://$_SERVER[HTTP_HOST]/home";
            $info = $this->model('user');
            $info->getInfoUser();

            if (isset($_SESSION['id'])){
                header("Location: $actual_link");
            }
        }
    }
?>
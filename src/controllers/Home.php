<?php
    class Home extends Controllers{
        public function default(){
            $this->view("home","Tổng quan","",[]);
        }
        public function khoanThu(){
            $this->view("home","Khoản thu","list",[]);
        }
        public function khoanChi(){

        }
        public function huTaiChi(){

        }
    }
?>
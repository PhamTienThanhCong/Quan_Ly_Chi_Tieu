<?php
    class Home extends Controllers{
        public function default(){
            $this->checkLogin();
            $this->view("home","Tổng quan","overView",[]);
        }
        public function khoanthu(){
            $this->checkLogin();
            $this->view("home","Khoản thu","list",[]);
        }
        public function khoanchi(){
            $this->checkLogin();
            $this->view("home","Khoản chi","list",[]);
        }
        public function hutaichi(){
            $this->checkLogin();
            $this->view("home","Hũ tài chính","FinancialJar",[]);
        }
        public function errors(){
            $this->view("not_found","404 not found",[]);
        }
    }
?>
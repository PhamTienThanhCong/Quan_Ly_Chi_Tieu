<?php
    class Home extends Controllers{
        public function default(){
            $this->checkLogin();
            $this->view("home","Tổng quan","overView",[]);
        }
        public function khoanThu(){
            $this->checkLogin();
            $this->view("home","Khoản thu","list",[]);
        }
        public function khoanChi(){
            $this->checkLogin();
            $this->view("home","Khoản chi","list",[]);
        }
        public function huTaiChi(){
            $this->checkLogin();
            $this->view("home","Hũ tài chính","FinancialJar",[]);
        }
    }
?>
<?php
    class Home extends Controllers{
        public function default(){
            $this->checkLogin();
            $this->view("home","Tổng quan","overView",[]);
        }
        public function overview(){
            $this->default();
        }
        public function thu(){
            $this->checkLogin();
            $this->view("home","Khoản thu","list",[]);
        }
        public function chi(){
            $this->checkLogin();
            $this->view("home","Khoản chi","list",[]);
        }
        public function usdt($page){
            $this->checkLogin();
            $this->binance_api($page);
        }
        public function errors(){
            $this->view("not_found","404 not found",[]);
        }
        public function binance_api($page){
            $page = $page[0];
            $curl = curl_init();
    
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://p2p.binance.com/bapi/c2c/v2/friendly/c2c/adv/search',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{"page":'.$page.',"rows":10,"payTypes":[],"asset":"USDT","tradeType":"BUY","fiat":"VND","publisherType":null}',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Cookie: cid=FBb5Btvt'
                ),
            ));
    
            $response = curl_exec($curl);
    
            curl_close($curl);
    
            $this->view("home","json_data","json_data",[$response,$page]);
    
        }
    }
?>
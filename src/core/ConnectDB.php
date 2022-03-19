<?php
    class ConnectDB{
        protected $connection;
        private $hostname = 'localhost';
        private $user = 'root';
        private $password = '';
        private $nameDB = 'quan_ly_chi_tieu'; 

        // private $user = 'id18626063_cong';
        // private $password = 'Congph@m2002';
        // private $nameDB = 'id18626063_quan_ly_chi_tieu';

        function __construct(){
            $this->connection = mysqli_connect("$this->hostname","$this->user","$this->password","$this->nameDB");
            if (!$this->connection){
                die ('Failed to connect with server');
            }  
            mysqli_set_charset($this->connection,'utf8');
        }
    }
?>
<?php
class App{
    private $url = [];
    private $controller = "home";
    private $action = "default";
    private $route = [];
    function __construct() {
        $this->ConvertUrl();
        $this->getController();
        $this->getAction();
        $this->route = $this->url?array_values($this->url):[];
        call_user_func([$this->controller, $this->action], $this->route);
    }

    public function ConvertUrl(){
        if(isset($_GET['url'])){
            $this->url = explode("/", trim($_GET['url']));
        }
    }

    public function getController(){
        if (isset($this->url[0])){
            if (file_exists("./src/controllers/". strtolower($this->url[0]) .".php")){
                $this->controller = strtolower($this->url[0]);
            }else{
                $this->controller = "home";
            }
            unset($this->url[0]);
        }
        require_once "./src/controllers/". $this->controller .".php";
        $this->controller = new $this->controller;
    }

    public function getAction(){
        if (isset($this->url[1])){
            if (method_exists($this->controller, strtolower($this->url[1]))){
                $this->action = strtolower($this->url[1]);
            }else{
                $this->action = "errors";
            }
            unset($this->url[1]);
        }
    }

}
?>
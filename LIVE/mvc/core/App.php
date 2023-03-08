<?php
class App{
    // http://localhost:81/workspace/live/home/Sayhi/1/2/3
    protected $controller="Home";
    protected $action="Sayhi";
    protected $params="[]";

    function __construct(){
        // Array ( [0] => home [1] => Sayhi [2] => 1 [3] => 2 [4] => 3 )
        $arr = $this->UrlProcess();
        // print_r($arr);

        // xử lí controller
        if( file_exists("./mvc/controllers/".$arr[0].".php")) {
            $this->controller = $arr[0];
            unset($arr[0]);
        }
        require_once "./mvc/controllers/". $this->controller .".php";
        $this->controller = new $this->controller;

        // xử lí action
        if(isset($arr[1])) {
            if( method_exists( $this->controller , $arr[1]) ) {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        // xử lí params
        $this->params = $arr?array_values($arr):[];
        
        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    function UrlProcess() {
        // home/Sayhi/1/2/3
        if( isset($_GET["url"]) ) {
            return explode("/", filter_var(trim($_GET["url"], "/"))); //
            
        }
    }
}
?>
<?php
namespace app\admin\controller;

class Index{

  public function index($a){
     // echo 'home';
     print_r( $a );
  }
  
  public function _404(){
    header("HTTP/1.1 404 Not Found");
     header("Status: 404 Not Found");
     echo '404';
  }
}

?>
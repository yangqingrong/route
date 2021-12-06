<?php
namespace app\index\controller;
use M\R;

class Index{

  public function index($a){
      echo 'home';
      
       echo '<hr />params:';
     print_r( $a );
     
     echo '<hr /> route name to url. admin_attachments_list: ';
     echo R::url('admin_attachments_list',1024,"a_string");
     echo '<hr />'; 
  }
  
  public function _404(){
    header("HTTP/1.1 404 Not Found");
     header("Status: 404 Not Found");
     echo '404';
  }
}

?>
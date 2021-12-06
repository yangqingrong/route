<?php
namespace app\admin\controller;

class Attachments{

  public function index($a){
      echo 'attachments index<hr />params: ';
     print_r( $a );
  }
   public function list($a){
      echo 'list<hr />params: ';
      
     print_r( $a );
  }
   public function save($a){
     echo 'save<hr />params: ';
     print_r( $a );
  }
  
   
}

?>
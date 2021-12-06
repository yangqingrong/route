<?php

spl_autoload_register( function($class){
    //echo $class;
    $path = $class ;
    /*
    if( strpos($class,'W\\') !== false ){
      $path =str_replace('W\\','app\\',$class);
    }
    else
        if( strpos($class,'M\\') !== false ){
      $path =str_replace('M\\','M\\',$class);
    }
    else{
      throw new  \Exception('class '.$class ." not found!");
    }
    */
    
    $path =str_replace('\\','/',$path);
    require_once( BASE_PATH . '/'.$path .'.php');
});
?>
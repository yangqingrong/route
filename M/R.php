<?php

namespace M;

class R{
   protected static $d=[];
  //  protected   $g=[];
   protected static $r;
   protected   $info=[];




   public   function group($a,$c){
       $inf =  $this->info;
     //  $this->g[] = $a;
      $this->info = array_merge($this->info , $a );
       $r = call_user_func_array($c, [$this,$a]);
       if( isset( $a['prefix']) && trim($a['prefix']) != ''){
           $this->any('/(.+)/(.+)', '$1.$2',@$a['name']);
       }
      $this->info = $inf;
   }
   
   public function get($p,$c,$n='')
   {
     return $this->rt([1],$p,$c,$n);
   }
   
   public function post($p,$c,$n='')
   {
     return $this->rt([2],$p,$c,$n);
   }
   
   public function any($p,$c,$n='')
   {
     return $this->rt([1,2],$p,$c,$n);
   }
   
   public function rt($m,$p,$c,$n='')
   {
     self::$d[] =[$m,$p,$c,$n,$this->info['namespace'],$this->info['prefix']];
     return $this;
   }
   
   public function start($s){
     
     $m = $_SERVER['REQUEST_METHOD'];
     $a = ['GET'=>1,'POST'=>2];
     $j = $a[$m];
     
     $k=-1;
     foreach(self::$d as $i=>$r)
     {
       if( in_array($j,$r[0]))
       {
         if(preg_match('#^'. $r[5].$r[1].'#',$s,$x)){
           if( strpos( $r[2],"\$") !== false ){
               $r[2]  = preg_replace('#^'. $r[5].$r[1].'#', $r[2], $s);
               $r[3] .= '.' .$r[2];
              // print_r( $r );
           }
           list($_c,$_a)=explode('.',$r[2]);
           $cl=$r[4]."\\".$_c;
           $o =new $cl();
           $o->$_a($x);
           $k=$j;
           return;
          // break;
         }
       }
     }
     if($k==-1){
         
       if( preg_match('#^[/]?(\S+)/(\S+)/(\S+)#',$s ,$x )){
        // echo 'matchs ';
         
        // print_r( $x );
         $cls = 'app\\'.$x[1].'\\controller\\'.$x[2];
         $a = $x[3];
         $o = new $cls();
         $o->$a($x);
         return;
       }
     
       foreach(self::$d as $i=>$r)
       {
          // print_r( $r );
         if($r[3]=='404'){
           
           list($_c,$_a)=explode('.',$r[2]);
           $cl= $r[4].'\\'.$_c;
           $o =new $cl();
           $o->$_a();
           break;
         }
       }
     }
   }
   
   public static function url($nm, ...$pr){
      foreach(self::$d as $i=>$r)
      {
         if($r[3]==$nm ){
           $pa=$pr;
           for($i=0;$i<count($pa);$i++)
           {
             $pa[$i]='#\\([^\\)]+\\)#';
           }
           
       
           $u =preg_replace($pa,$pr,$r[5].$r[1],1);
           $u = str_replace("\\.",".",$u);
            $u = str_replace("\\-","-",$u);
          // $u = preg_replace(['#\\\.#','#\\\-#'], ['.','-'], $u);
            return trim($u ,'^$');
           
         }
      }
      return '';
   }
   public static function make()
   {
     if(!isset(self::$r))
     {
       self::$r=new R();
     }
     return self::$r;
   }
   
}
?>
<?php

use M\R;

$r = R::make();

$r->group(['namespace' =>'app\\index\\controller','prefix'=>'','name'=>'default'],function($r,$a){
 
    $r->any('404','Index._404','404');
    
});

$r->group(['namespace' =>'app\\index\\controller','prefix'=>'','name'=>'index'],function($r,$a){
    $r->get('/$','Index.index','home');
    $r->get('/contact$','Contact.index','contact');
    
});

$r->group(['namespace' =>'app\\admin\\controller','prefix'=>'/adminRandomStrfe2F5eDr6Gidb8ae','name'=>'admin'],function($r,$a){
    $r->any('$','Index.index','dashboard');
     $r->any('/$','Index.index','dashboard');
    $r->get('/attachments$','Attachments.index','admin_attachments');
    $r->post('/attachments/save$','Attachments.save','admin_attachments_save');
    $r->any('/attachments/list/(\d+)\-(.+)\.html','Attachments.list','admin_attachments_list');
});
 

return $r;
?>
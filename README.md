# route
a simple and fast route class &amp; demo for php 7/8

# getting start

1. clone this project,or download it.and move it to a directory.
2. create a nginx site config ,for example

```nginx

    server {
        listen       80 ;
        server_name   127.0.0.1;
        #charset koi8-r;
        #access_log  logs/host.access.log  main;
        root /yangqingrong/route/public;
        
       location / {
        
            index index.php index.html index.htm;
            if (!-e $request_filename)
            {
               rewrite ^(.*)$ /index.php?_path_info=$1 last; #redirect every thing not foud to index.php
               break;
            }
        }
 }

```

# route config
please take a look `routes/web.php`

```php
$r->get('regular expression','Controller.method','router_name');
$r->post('regular expression','Controller.method','router_name');
$r->any('regular expression','Controller.method','router_name'); //any request method,get or post
```
for example:
```php
$r->get('/contact$','Contact.index','contact');
$r->post('/contact$','Contact.index','contact');
$r->any('/contact$','Contact.index','contact');
```
# url
conver route name with param values to url
please see the example in file `/app/index/controller/Index.php`
```php
echo \M\R::url('admin_attachments_list',1024,"a_string");
```

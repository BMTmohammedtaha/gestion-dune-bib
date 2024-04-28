<?php


require 'database.php';
require 'includes/header.php';
require 'includes/nav.php';

$base_url = 'http://localhost:8000/';

$path = parse_url(trim( $_SERVER['REQUEST_URI'],'/'))['path'];

$page =  __DIR__  . '/pages/' . $path .'.php';

if(file_exists($page)){
    include $page;
}
else echo "<h1>Page Not Exists</h1>";

require 'includes/footer.php';

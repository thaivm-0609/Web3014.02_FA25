<?php 
use Bramus\Router\Router; //nạp package bramus router

$router = new Router(); //B1: khởi tạo object $router từ class Router() 

//Chia router ra 2 phần admin/client riêng biệt:
require 'admin.php';
require 'client.php';

$router->run(); //B3: thực thi router
?>

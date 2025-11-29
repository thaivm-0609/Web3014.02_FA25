<?php 
use Bramus\Router\Router; //nạp package bramus router

$router = new Router(); //B1: khởi tạo object $router từ class Router() 

//B2: khai báo đường dẫn: $router->method('url', function);
$router->get('/', function () {
    echo "Đây là trang chủ";
});

$router->get('/test', function () {
    echo "Testing";
});

$router->run(); //B3: thực thi router
?>

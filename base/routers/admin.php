<?php
//use namespace\TenClass

//B2: khai báo đường dẫn: 
//Cách 1: $router->method('url', function); //viết trực tiếp xử lý logic vào trong function
// $router->get('/', function () {
//     echo "Đây là trang chủ";
// });
// $router->get('/test', function () {
//     echo "Testing";
// });

//Cách 2: gọi hàm từ Controller
//khởi tạo 1 object từ class Controller;

use App\Controllers\ProductController;

$router->mount('/admin', function() use ($router) {
    $router->mount('/products', function() use ($router) {
        $router->get('/list', ProductController::class.'@index');
        //thêm mới
        $router->get('/create', ProductController::class.'@create'); //hiển thị form thêm mới
        $router->post('/store', ProductController::class.'@store'); //lưu dữ liệu vào db

        $router->get('/detail/{id}', ProductController::class.'@detail'); //{id}: truyền id của bản ghi lên URL
        $router->get('/delete/{id}', ProductController::class.'@delete');
    });
    $router->mount('/users', function() use ($router) {
        $router->get('/list', function() {});
        $router->get('/create', function() {});
    });
});

?>
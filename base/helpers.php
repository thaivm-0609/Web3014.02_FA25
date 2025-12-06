<?php

//cấu hình bladeone để hiển thị giao diện

use eftec\bladeone\BladeOne;

if (!function_exists('view')) { //kiểm tra nếu chưa tồn tại hàm view
    function view($view, $data=[]) {
        $views = __DIR__ . '/views'; //đường dẫn lưu trữ file giao diện
        $cache = __DIR__ . '/storages/cache'; //đường dẫn lưu trữ file cache (bộ nhớ tạm)
        $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);

        echo $blade->run($view, $data); //hiển thị ra file giao diện
    }
}

if (!function_exists('redirect')) {
    function redirect($path) {
        header('location: '.$path);
        exit;
    }
}

if (!function_exists('redirect404')) {
    function redirect404() {
        header('HTTP/1.1 404 Not found');
        exit;
    }
}

if (!function_exists('file_url')) {
    function file_url($path) {
        if (!file_exists($path)) {
            return null;
        }

        return $_ENV['APP_URL'].$path;
    }
}

?>

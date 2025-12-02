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
?>

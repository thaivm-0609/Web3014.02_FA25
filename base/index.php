<?php
//require (nhúng) những file cần thiết cho dự án

use Dotenv\Dotenv;

require 'vendor/autoload.php';

Dotenv::createImmutable(__DIR__)->load(); //tải thông tin từ file .env

require 'routers/index.php';
?>

<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController {
    protected Product $product; //tạo ra 1 biến

    public function __construct()
    {
        $this->product = new Product(); //gán cho biến $product là 1 object từ class Product Model
    }

    public function index() {
        $data = $this->product->getList(); //gọi hàm getList ở trong ProductModel
        
        return view('list', compact('data')); //hiển thị ra giao diện và truyền biến $data
    }
}
?>

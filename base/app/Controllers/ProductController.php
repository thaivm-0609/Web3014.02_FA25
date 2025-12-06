<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;
use Rakit\Validation\Validator;

class ProductController extends Controller {
    protected Product $product; //tạo ra 1 biến
    protected Category $category; 

    public function __construct()
    {
        $this->product = new Product(); //gán cho biến $product là 1 object từ class Product Model
        $this->category = new Category(); 
    }

    public function index() {
        $data = $this->product->getList(); //gọi hàm getList ở trong ProductModel
        
        //compact('data') tương đương với ['data' => $data];
        return view('list', compact('data')); //hiển thị ra giao diện và truyền biến $data
    }

    public function detail($id) { //$id được truyền qua {id} ở router
        //truyền id sang model để thực hiện truy vấn 
        $data = $this->product->getDetail($id);

        return view('detail', ['product' => $data]);
    }

    public function delete($id) {
        $product = $this->product->getDetail($id); //tìm bản ghi có id tương ứng
        if ($product['image'] && file_exists('storages/uploads/products/'.$product['image'])) { //kiểm tra xem bản ghi có ảnh đc upload lên hay ko?
            unlink('storages/uploads/products/'.$product['image']); //sử dụng hàm unlink để xóa
        }

        $this->product->delete($id); //gọi hàm delete ở trong model

        redirect('/admin/products/list'); //điều hướng người dùng về trang danh sách
    }

    public function create() { //hiển thị ra form thêm mới
        $categories = $this->category->getList(); //lấy danh sách categories để hiển thị ra ô select
        
        return view('create', compact('categories'));
    }
    
    public function store() { //thực hiện lưu dữ liệu vào database
        $data = $_POST + $_FILES; //lấy dữ liệu người dùng nhập vào form
       
        //validate dữ liệu
        $validator = new Validator();
        $errors = $this->validate(
            $validator,
            $data,
            [
                'name' => 'required|min:3',
                'image' => 'nullable|uploaded_file:0,2048kb,png,jpeg,jpg',
                'price' => 'required|numeric',
                'category_id' => 'required',
            ]
        );
        
        if (!empty($errors)) { //nếu $errors khác rỗng
            $_SESSION['errors'] = $errors; //lưu lỗi vào trong session
            
            redirect('/admin/products/create');
        } 

        unset($_SESSION['errors']);
        //upload file
        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) { //kiểm tra người dùng có upload file lên không
            //thực hiện upload file và gán dữ liệu cho $data['image];
            $data['image'] = $this->uploadFile($_FILES['image']);
        } else {
            $data['image'] = null;
        }

        $this->product->store($data); //gọi hamf store ở trong model để thêm mới

        redirect('/admin/products/list'); //điều hướng người dùng về trang danh sách
    }

    public function edit($id) {
        $product = $this->product->getDetail($id); //lấy dữ liệu cũ
        if (empty($product)) {
            redirect404();
        }
        $categories = $this->category->getList(); //lấy danh sách danh mục

        return view('edit', compact('product', 'categories'));
    }

    public function update($id) {
        $product = $this->product->getDetail($id);
        if (empty($product)) {
            redirect404();
        }

        $data = $_POST + $_FILES; //lấy dữ liệu người dùng nhập vào form
       
        //validate dữ liệu
        $validator = new Validator();
        $errors = $this->validate(
            $validator,
            $data,
            [
                'name' => 'required|min:3',
                'image' => 'nullable|uploaded_file:0,2048kb,png,jpeg,jpg',
                'price' => 'required|numeric',
                'category_id' => 'required',
            ]
        );
        
        if (!empty($errors)) { //nếu $errors khác rỗng
            $_SESSION['errors'] = $errors; //lưu lỗi vào trong session
            
            redirect('/admin/products/edit/'.$id);
        } 

        unset($_SESSION['errors']);
        //upload file
        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) { //kiểm tra người dùng có upload file lên không
            //thực hiện upload file và gán dữ liệu cho $data['image];
            $data['image'] = $this->uploadFile($_FILES['image']);
            //nếu upload file mới thì phải xóa file cũ
            unlink('storages/uploads/products/'.$product['image']);
        } else { //nếu ko upload ảnh mới thì giữ nguyên
            $data['image'] = $product['image'];
        }

        $this->product->update($id, $data); //gọi hamf store ở trong model để thêm mới

        redirect('/admin/products/list'); //điều hướng người dùng về trang danh sách
    }
}
?>

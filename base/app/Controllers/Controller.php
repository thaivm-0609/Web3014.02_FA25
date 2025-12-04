<?php
//namespace: không gian tên;
namespace App\Controllers;
 
class Controller {
    public function home() {
        echo "Đây là trang chủ";
    }

    public function test() {
        echo "Đây là trang test";
    }

    //xử lý logic upload file
    public function uploadFile(array $file) {
        
        //lấy thông tin của file được upload lên
        $tmpPath = $file['tmp_name']; //lấy đường dẫn lưu tạm của file
        $fileName = time().'-'.$file['name']; //ghép thêm thời gian vào tên file để tránh bị trùng tên
        $uploadDir = 'storages/uploads/products'; //vị trí lưu file ở trên server
    
        //nếu $uploadDir chưa tồn tại thì khởi tạo thư mục
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        //khai báo đường dẫn lưu file trên server
        $finalPath = $uploadDir.'/'.$fileName;
        
        if (move_uploaded_file($tmpPath, $finalPath)) {
            return $fileName;
        }
    
        throw new \Exception('Lỗi upload file');
    }
}
?>
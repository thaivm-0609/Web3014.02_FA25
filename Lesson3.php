<?php
/**
 * Lập trình hướng đối tượng (OOP: Object Oriented Programming)
 * - là mô hình phát triển phần mềm, ở đó mô phỏng các đối tượng thực tế
 * vào trong phần mềm để máy tính hiểu được => lưu trữ => thao tác với
 * các đối tượng đó
 * - C: create: thêm mới
 * - R: read: hiển thị danh sách, thông tin chi tiết
 * - U: update: chỉnh sửa
 * - D: delete: xóa
 * VD: website bán hàng: sản phẩm, danh mục, người dùng.
 * 
 * 2 KHÁI NIỆM CẦN NẮM KHI LÀM VIỆC VỚI OOP
 * - Class: tập hợp những đối tượng (object) có những thuộc tính/hành động giống nhau
 *      class TenClass {
 *          //thuộc tính (biến/hằng số): là những thông tin mà hệ thống cần quản lý
 *          //hành động/phương thức (hàm): là những thao tác mà một đối tượng có thể thực hiện
 *      }
 * 
 * - Object: một đối tượng cụ thể được khởi tạo từ class
 *      $tenObject = new TenClass();
 * 
 * 4 tính chất của lập trình hướng đối tượng:
 * - KẾ THỪA: class con được kế thừa/sử dụng những thuộc tính,phương thức 
 * đã được định nghĩa ở trong class cha.
 *            cú pháp: class TenClassCon extends TenClassCha {}
 * - ĐÓNG GÓI: quy định mức độ truy cập (access level) cho các thuộc tính/phương thức
 *      * public: công khai (ai cũng có thể xem đc)
 *      * protected: chỉ có bản thân class cha và class con có thể truy cập
 *                  Muốn truy cập/gán giá trị => phải sử dụng hàm getter/setter chứ không 
 *                  được truy cập trực tiếp giống như public
 *      * private: chỉ có bản thân class đấy có thể truy cập
 * 
 * - TRỪU TƯỢNG
 * - ĐA HÌNH
 */
class SinhVien {
    //thuộc tính(biến)
    public $maSinhVien;
    public $hoTen;
    public $tuoi;
    protected $diemThi;

    //hàm construct sẽ được thực thi ngay khi khởi tạo object từ class
    public function __construct($inputMaSinhVien, $inputHoTen, $inputTuoi)
    {
        //gán giá trị cho các thuộc tính
        //$this->tenThuocTinh = $giáTrịThuộcTính
        $this->maSinhVien = $inputMaSinhVien;
        $this->hoTen = $inputHoTen;
        $this->tuoi = $inputTuoi;
    }

    public function getDiemThi() { //hàm getter để lấy thông tin điểm thi
        echo $this->diemThi;
    }

    public function setDiemThi($inputDiemThi) { //hàm setter để gán giá trị thuộc tính
        $this->diemThi = $inputDiemThi;
    }

    //phương thức (hàm)
    public function hienThiThongTin() {
        //sử dụng biến giả để truy cập giá trị thuộc tính
        //$this->tenThuocTinh;
        echo $this->maSinhVien.'-'.$this->hoTen.'-'.$this->tuoi;
    }
}

// class không có __construct() => khởi tạo object rỗng, sau đó gán giá trị thuộc tính
// $tam = new SinhVien(); //khởi tạo object từ class
// $tam->maSinhVien = 'PH12345'; //gán giá trị thuộc tính của object
// $tam->hoTen = 'Tâm';
// $tam->tuoi = 20;
// $tam->hienThiThongTin(); //gọi phương thức/hàm đã được khai báo ở trong class

// class có __construct() => truyền giá trị thuộc tính vào ngay khi khởi tạo object
// $thaivm2 = new SinhVien('PH12345', 'Vương Minh Thái', 100);
// //truy suất thuộc tính: $tenObject->tenThuocTinh;
// echo $thaivm2->maSinhVien.'<br>';
// echo $thaivm2->hoTen.'<br>';
// echo $thaivm2->tuoi.'<br>';
// //thực thi phương thức: $tenObject->tenHam();
// $thaivm2->hienThiThongTin();

class SinhVienCNTT extends SinhVien {
    public $diemPhp2;

    public function __construct($inputMaSinhVien, $inputHoTen, $inputTuoi, $inputDiemPhp2)
    {
        // $this->maSinhVien = $inputMaSinhVien;
        // $this->hoTen = $inputHoTen;
        // $this->tuoi = $inputTuoi;
        parent::__construct($inputMaSinhVien,$inputHoTen,$inputTuoi); //thực thi hàm __construct ở trong class cha
        $this->diemPhp2 = $inputDiemPhp2;
    }

    public function hienThiThongTin()
    {
        parent::hienThiThongTin();
        echo '<br>'.$this->diemPhp2;
    }
}

$thaivm2 = new SinhVienCNTT('PH123', 'thaivm2', 10, 5);
$thaivm2->hoTen = 'Vương Minh Thái';
// $thaivm2->setDiemThi(10);
// $thaivm2->getDiemThi();
$thaivm2->hienThiThongTin();
?>
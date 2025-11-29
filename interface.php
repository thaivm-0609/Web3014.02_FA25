<?php 
/** Interface: được đưa ra để quy định những hàm phải có ở trong class 
 * cú pháp: 
 * interface TenInterface {
 *      //CHỈ CÓ THỂ LƯU HẰNG SỐ
 *      //phương thức: function trong interface chỉ khai báo, ko có thân hàm (xử lý logic)   
 * }
*/

interface DaGiac {
    const PI = 3.14;
    // interface không được lưu biến, chỉ có lưu hằng số
    // public $tenBien = 3; //báo lỗi Interfaces may not include properties

    //các function ở trong interface KHÔNG ĐƯỢC PHÉP CÓ BODY (XỬ LÝ LOGIC) 
    //không có từ khóa abstract giống như abstract function
    //khi sử dụng thì phải ghi đè lại các function
    public function tinhChuVi();
    public function tinhDienTich();
}

interface Hinh2D {
    public function test();
}

//sử dụng từ khóa implements
//1 class có thể implements được nhiều interface
//1 class chỉ có thể extends 1 class cha
class HinhChuNhat implements DaGiac, Hinh2D {
    public function tinhChuVi()
    {

    }

    public function tinhDienTich()
    {

    }

    public function test() {
    }
}


interface HocSinhNgoan {
    public function hocTot(); 
    public function yThucTot();
}

class HocSinhA implements HocSinhNgoan {
    public function hocTot() {
        echo "Đi học, làm bài đầy đủ";
    }

    public function yThucTot() {
        echo "Không nói chuyện, làm việc riêng trong giờ";
    }
}
?>

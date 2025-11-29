<?php 
/**
 * Abstract class: Lớp trừu tượng
 * cú pháp: abstract class TenClass {
 *      //thuộc tính: 
 *      //phương thức: có ít nhất một abstract function (hàm trừu tượng)
 *      //khai báo hàm trừu tượng: 
 *          abstract public function tenHam();
 *      //hàm trừu tượng không có thân hàm (xử lý logic);
 *      //khi class con kế thừa abstract class thì bắt buộc phải ghi đè lại abstract function
 * }
 * 
 */
abstract class DongVat {
    public $ten;
    public $soChan;

    public function an() {

    }

    //abstract function chỉ có khai báo tên, ko có thân hàm (xử lý logic)
    abstract public function di();
}

class Ga extends DongVat {
    // class con kế thừa lại abstract class thì bắt buộc phải ghi đè lại abstract function;
    public function di() {
        echo 'Đi bằng '.$this->soChan.' chân';
    }
}

class Cho extends DongVat {
    public function di() {
        //xử lý logic;
    }
}

$x = new Ga;
$x->soChan = 2;
$x->di();
?>

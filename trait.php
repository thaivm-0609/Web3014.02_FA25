<?php
//trait: đưa ra để mô phỏng "đa kế thừa"
trait TraitA {
    //có thể khai báo cả biến và hằng số
    public $tenBien = 1;
    public const G = 9.8;

    public function test() {
        //xử lý logic
        echo "Đây là trait A";
    }
}

trait TraitB {
    public function show() {
        echo "Đây là trait B";
    }
}

//sử dụng từ khóa use TenTrait1, TenTrait2 để mô phỏng đa kế thừa
class ClassCon {
    use TraitA, TraitB;
}

$a = new ClassCon;
$a->test();
$a->show();
?>

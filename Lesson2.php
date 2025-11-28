<?php
/**
 * Cấu trúc điều khiển:
 */

/**if else 
 * if (điều kiện 1) {
 *  logic nếu điều kiện 1 đúng
 * } else if (điều kiện 2) {
 *  logic nếu điều kiện 2 đúng
 * } else {
 *  logic nếu cả dk1 và dk2 đều sai
 * }
 * 
 * Toán tử 3 ngôi: $tenBien = dk ? giá trị nếu đk đúng : giá trị nếu điều kiện sai
 */
function kiemTraChanLe($a) {
    // if ($a%2 == 1) {
    //     echo $a.' là số lẻ';
    // } else {
    //     echo $a.' là số chẵn';
    // }

    $kq = $a%2 == 1 ? 'lẻ' : 'chẵn';
    echo $a.' là số '.$kq;
}
// kiemTraChanLe(9);

/**Vòng lặp: for/foreach while/do while
 * for(khởi tạo giá trị; điều kiện lặp; bước nhảy) {
 *  xử lý logic
 * }
 * 
 * foreach($array as $item) {
 *  
 * }
 * 
 * Kiểm tra điều kiện trước, nếu điều kiện đúng thì tiếp tục thực hiện
 * while (điều kiện) { 
 *  xử lý logic
 * }
 * 
 * Thực thi code trước, sau đấy mới kiểm tra điều kiện
 * do {
 *  xử lý logic
 * } while (điều kiện)
 */
for($i=1;$i<=10;$i++) { //khởi tạo i=1; nếu i<=10 thì tiếp tục lặp; mỗi lần lặp tăng i lên 1 đơn vị
    echo $i.', ';
}

$listNumber = [1,3,5,7,9]; //nhân từng phần tử trong mảng lên 3 lần và in ra màn hình
foreach($listNumber as $n) {
    echo ($n*3).', ';
}

for($i=0;$i<count($listNumber);$i++) {
    echo ($listNumber[$i]*3).', ';
}

/**switch case */
$case;
switch ($case) {
    case '1': 
        //xử lý logic nếu $case == 1;
        break;
    case '2';
        //xử lý logic nếu $case == 2;
        break;
    default:
        //xử lý logic nếu $case không nằm trong những trường hợp trên
        break;
}
?>

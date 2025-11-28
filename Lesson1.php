<?php 
/**
 * Khởi tạo biến: 
 * $tenBien; khởi tạo nhưng không gán giá trị cho nó
 * $tenBien = value; khởi tạo và gán giá trị
 * $tenBien = value2; gán giá trị mới cho biến
 * 
 * - Quy tắc đặt tên biến: danh sach san pham;
 * + KHÔNG ĐƯỢC BẮT ĐẦU BẰNG SỐ
 * + camelCase: $danhSachSanPham => đặt tên biến/object/hàm
 * + snake_case: $danh_sach_san_pham
 * + PascalCase: DanhSachSanPham => đặt tên Class
 */

$a; 
$b = 1;

/**Hằng số: 
 * - BẮT BUỘC KHAI BÁO GIÁ TRỊ NGAY KHI KHỞI TẠO
 * const TEN_HANG = value;
 * define(TEN_HANG, value); 
 */
const PI = 3.14;
define('PAGINATE', 10);

/**
 * Hàm (function):
 * - Phân loại hàm: 
 * + Theo tham số đầu vào (params):
 *      * Có tham số đầu vào
 *      * Không có tham số đầu vào
 * + Theo giá trị trả về:
 *      * Có giá trị trả về: có return ở cuối hàm
 *          $tenBien = tenHam();  gán giá trị trả về của hàm cho biến
 *      * Không có giá trị trả về
 *          tenHam(); gọi tên hàm để thực thi
 * function tenHam(params) {
 * }
 */
?>
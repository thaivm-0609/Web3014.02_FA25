<?php
namespace App\Models;

use Doctrine\DBAL\DriverManager;

class Model { 
    //Nhiệm vụ 1:  kết nối với CSDL 
    protected $connection; //tạo kết nối
    protected $table; //tên bảng sẽ truy vấn

    public function __construct()
    {
        //lấy thông tin biến môi trường từ .env để tạo kết nối
        $connectInfo = [
            'dbname' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'driver' => $_ENV['DB_DRIVER'],
        ];
        //sử dụng DBAL để kết nối với CSDL
        $this->connection = DriverManager::getConnection($connectInfo);
    }

    public function __destruct()
    {
        $this->connection->close(); //đóng kết nối với db
    }

    //Nhiệm vụ 2: truy vấn dữ liệu
    public function getList() 
    {
        $queryBuilder = $this->connection->createQueryBuilder(); //khởi tạo queryBuilder
        //khai báo câu truy vấn sử dụng queryBuilder
        $queryBuilder->select('*')
            ->from($this->table);

        return $queryBuilder->fetchAllAssociative(); //lấy nhiều bản ghi
    }

    public function getDetail($id)
    {
        $queryBuilder = $this->connection->createQueryBuilder(); 
        $queryBuilder->select('*')
            ->from($this->table)
            ->where('id = :id')
            ->setParameter('id', $id); //gán giá trị của $id cho :id

        return $queryBuilder->fetchAssociative(); //lấy 1 bản ghi duy nhất
    }

    public function delete($id)
    {
        return $this->connection->delete($this->table, ['id' => $id]);
    }

    public function store($data) 
    {
        $this->connection->insert($this->table, $data); 

        return $this->connection->lastInsertId();
    }
}

?>

<?php
    define("DB_SERVER","localhost");
    define("DB_NAME","");
    define("DB_USERNAME","root");
    define("DB_PASSWORD","");
    define("DB_PORT",3306);
    define('DB_OPTIONS', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Kích hoạt chế độ báo lỗi của PDO
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Kết quả truy vấn được trả về dưới dạng mảng liên kết
        PDO::ATTR_EMULATE_PREPARES => false // Không sử dụng mô phỏng các câu lệnh chuẩn bị
    ]);
    define("BASE_PATH",__DIR__."/../");
    

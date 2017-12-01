<?php
date_default_timezone_set("Europe/Moscow");
require_once __DIR__ . "/conn_db.php";

class postPosts
{
    protected $conn;

    public function __construct()
    {
        $this->conn = new PDO('mysql:host=' . DB_HOST . '; dbname=test;charset=utf8', DB_USER, DB_PASSWORD);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function main(array $array)
    {
        try {
            $insert = $this->conn->prepare("INSERT IGNORE INTO `guest_book` (`dtime`, `name`, `body`) VALUES (:data_time, :data_name, :data_body)");
            $insert->bindValue(':data_time', $array["data_time"], PDO::PARAM_INT);
            $insert->bindValue(':data_name', $array["data_name"], PDO::PARAM_STR);
            $insert->bindValue(':data_body', $array["data_body"], PDO::PARAM_STR);
            $insert->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
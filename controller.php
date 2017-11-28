<?php
/**
 * Created by PhpStorm.
 * User: ratherrum
 * Date: 28.11.17
 * Time: 12:28
 */
date_default_timezone_set("Europe/Moscow");
error_reporting(E_ALL);
require_once __DIR__ . "/conn_db.php";

$data_sent = array();
if (empty($_POST['name']) || empty($_POST['text'])) {
    $data_sent['error_msg'] = "Поля не могут быть пустыми";
} else {
    $data_sent['success_msg'] = 'Запись добавлена';
    $data_array = ["data_name" => $_POST['name'], "data_body" => $_POST['text'], "data_time" => date('Y-m-d H:i:s')];
    $obj = new GuestBook();
    $obj->main($data_array);
}
echo json_encode($data_sent);

class GuestBook
{
    private $conn;
    public function main(array $array)
    {
        try {
            $this->conn = new PDO('mysql:host=' . DB_HOST . '; dbname=test;charset=utf8', DB_USER, DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $insert = $this->conn->prepare("INSERT IGNORE INTO `guest_book` (`dtime`, `name`, `body`) VALUES (:data_time, :data_name, :data_body)");
            $insert->bindValue(':data_time', $array["data_time"], PDO::PARAM_INT);
            $insert->bindValue(':data_name', $array["data_name"], PDO::PARAM_STR);
            $insert->bindValue(':data_body', $array["data_body"], PDO::PARAM_STR);
            $insert->execute();
           // $this->get_posts();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /*public function get_posts()
    {
        try {
            $get_posts = $this->conn->prepare("SELECT dtime, name, body FROM guest_book ORDER BY id DESC LIMIT 5");
            $get_posts->execute();
            $posts = $get_posts->fetchAll(\PDO::FETCH_ASSOC);
            echo json_encode($posts);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }*/
}
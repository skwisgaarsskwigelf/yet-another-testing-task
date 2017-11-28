<?php
date_default_timezone_set("Europe/Moscow");
error_reporting(E_ALL);
require_once __DIR__ . "/conn_db.php";

class getPosts
{
    private $conn;

    public function main()
    {
        try {
            $this->conn = new PDO('mysql:host=' . DB_HOST . '; dbname=test;charset=utf8', DB_USER, DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $get_posts = $this->conn->prepare("SELECT dtime, name, body FROM guest_book ORDER BY id DESC LIMIT 5");
            $get_posts->execute();
            $posts = $get_posts->fetchAll(\PDO::FETCH_ASSOC);
            echo json_encode($posts);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

$obj = new getPosts();
$obj->main();